<?php
require_once "modelos/DB.php";

class NeumaticosModelo {
  public function getEstados() {
    $estados = array();
    $estados[] = array("id"=>1,"estado"=>"Nueva");
    $estados[] = array("id"=>2,"estado"=>"Usada");
    $estados[] = array("id"=>3,"estado"=>"Recapada (uno)");
    $estados[] = array("id"=>4,"estado"=>"Recapada (dos)");
    return $estados;
  }
  
  public function getDestinos() {
    $destinos = array();
    $destinos[] = array("id"=>1,"destino"=>"Taller");
    $destinos[] = array("id"=>2,"destino"=>"Recapado (Proveedor)");
    $destinos[] = array("id"=>3,"destino"=>"Pañol");
    return $destinos;
  }

  public function getNeumaticos() {
    $consulta = DB::select("select * from neumaticos order by codigo",null);
    return $consulta;
  }

  public function getHistorial($id) {
    $consulta = DB::select("select idhistorial,fecha,operaciones_neuma.descripcion as operacion,destino,kilometros,vehiculos.descripcion as vehiculo,posicion,observaciones
                            from historial_neuma
                            left outer join operaciones_neuma on historial_neuma.idoperacion=operaciones_neuma.idoperacion
                            left outer join vehiculos on historial_neuma.idvehiculo=vehiculos.idvehiculo
                            where idNeumatico=? order by fecha",array($id));
    return $consulta;
  }

  public function getUbicacionVehiculo($idv) {
    $arreglo = array();
    for ($i=1;$i<=16;$i++) {
      $consulta = DB::select("select historial_neuma.fecha,posicion,codigo,marca,modelo,historial_neuma.kilometros from vw_ultimo_hist_neuma
        inner join historial_neuma on vw_ultimo_hist_neuma.ultimo=historial_neuma.idHistorial
        inner join neumaticos on historial_neuma.idNeumatico=neumaticos.idNeumatico
        where historial_neuma.idOperacion=2 and idVehiculo=? and posicion=?",array($idv,$i));

      if ($registro=$consulta->fetch()) {
        $arreglo[$i] = $registro['codigo'];
      }
      else {
        $arreglo[$i] = 0;
      }
     }

    return $arreglo;
  }

  public function getUbicacionNeumatico($idn) {
    $consulta = DB::select("select neumaticos.idNeumatico,idVehiculo,codigo from vw_ultimo_hist_neuma
      inner join historial_neuma on vw_ultimo_hist_neuma.ultimo=historial_neuma.idHistorial
      inner join neumaticos on historial_neuma.idNeumatico=neumaticos.idNeumatico
      where historial_neuma.idOperacion=2 and vw_ultimo_hist_neuma.idNeumatico=?",array($idn));
    return $consulta;
  }

  public function getStock() {
    $consulta = DB::select("select codigo,marca,modelo,medida,estado,operaciones_neuma.descripcion as operacion,destino,vehiculos.descripcion as vehiculo,posicion from neumaticos
      left outer join vw_ultimo_hist_neuma on neumaticos.idNeumatico=vw_ultimo_hist_neuma.idNeumatico
      left outer join historial_neuma on vw_ultimo_hist_neuma.ultimo=historial_neuma.idHistorial
      left outer join operaciones_neuma on historial_neuma.idOperacion=operaciones_neuma.idOperacion
      left outer join vehiculos on historial_neuma.idVehiculo=vehiculos.idVehiculo
      order by codigo",null);
    return $consulta;
  }

  public function getUltimos() {
    $consulta = DB::select("select operaciones_neuma.idOperacion,COUNT(ultimo) as cantidad,descripcion
      from operaciones_neuma
      left outer join vw_ultimo_hist_neuma on operaciones_neuma.idOperacion=vw_ultimo_hist_neuma.idOperacion
      group by idOperacion",null);
    return $consulta;
  }

  public function getAlgunos() {
    $consulta = DB::select("select idOperacion,descripcion,count(idNeumatico) as cantidad from (
      select distinct operaciones_neuma.idOperacion,descripcion,idNeumatico
      from operaciones_neuma
      left outer join historial_neuma on operaciones_neuma.idOperacion=historial_neuma.idOperacion
      order by operaciones_neuma.idOperacion
      ) as tabla
      group by idOperacion",null);
    return $consulta;
  }

  public function getOperaciones() {
    $consulta = DB::select("select * from operaciones_neuma where mostrar=1 order by idOperacion",null);
    return $consulta;
  }

  public function selectNeumatico($id) {
    $sql   = "select * from neumaticos";
    $where = "idNeumatico=?";
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }

  public function getId($codigo) {
    $sql   = "select idNeumatico from neumaticos";
    $where = "codigo=?";
    $bind  = array($codigo);
    $consulta = DB::selectWhere($sql,$where,$bind);
    $registro = $consulta->fetch();
    return $registro['idNeumatico'];
  }

  public function insertNeumatico($codigo,$marca,$modelo,$medida,$estado,$proveedor,$fecha,$precio,$kilometros,$observaciones) {
    $id = DB::insert("insert into neumaticos (codigo,marca,modelo,medida,estado,proveedor,fecha,precio,kilometros,observaciones) values (?,?,?,?,?,?,?,?,?,?)",array($codigo,$marca,$modelo,$medida,$estado,$proveedor,$fecha,$precio,$kilometros,$observaciones));
    return $id;
  }

  public function insertHistorial($idneumatico,$fecha,$idoperacion,$destino,$idvehiculo,$kilometros,$posicion,$observaciones) {
    $id = DB::insert("insert into historial_neuma (idneumatico,fecha,idoperacion,destino,idvehiculo,kilometros,posicion,observaciones) values (?,?,?,?,?,?,?,?)",array($idneumatico,$fecha,$idoperacion,$destino,$idvehiculo,$kilometros,$posicion,$observaciones));
    return $id;
  }

  public function updateOperario($id,$nombre,$abreviatura) {
    $cantidad = DB::update("update operarios set nombre=?,abreviatura=? where idoperario=?",
      array($nombre,$abreviatura,$id));
    return $cantidad;
  }

  public function deleteOperario($id) {
    $id = DB::delete("delete from operarios where idOperario=?",array($id));
    return $id;
  }
}
?>
