<?php
require_once "modelos/DB.php";

class NeumaticosModelo {
  public function getNeumaticos() {
    $consulta = DB::select("select * from neumaticos order by codigo",null);
    return $consulta;
  }

  public function getHistorial($id) {
    $consulta = DB::select("select idhistorial,fecha,operaciones_neuma.descripcion as operacion,kilometros,vehiculos.descripcion as vehiculo,posicion,observaciones
                            from historial_neuma 
                            left outer join operaciones_neuma on historial_neuma.idoperacion=operaciones_neuma.idoperacion
                            left outer join vehiculos on historial_neuma.idvehiculo=vehiculos.idvehiculo
                            where idNeumatico=? order by fecha",array($id));
    return $consulta;
  }

  public function getOperaciones() {
    $consulta = DB::select("select * from operaciones_neuma order by idOperacion",null);
    return $consulta;
  }

  public function selectNeumatico($id) {
    $sql   = "select * from neumaticos";
    $where = "idNeumatico=?";
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }

  public function insertNeumatico($codigo,$marca,$modelo,$medida,$estado,$fecha,$precio,$kilometros,$observaciones) {
    $id = DB::insert("insert into neumaticos (codigo,marca,modelo,medida,estado,fecha,precio,kilometros,observaciones) values (?,?,?,?,?,?,?,?,?)",array($codigo,$marca,$modelo,$medida,$estado,$fecha,$precio,$kilometros,$observaciones));
    return $id;
  }

  public function insertHistorial($idneumatico,$fecha,$idoperacion,$idvehiculo,$kilometros,$posicion,$observaciones) {
    $id = DB::insert("insert into historial_neuma (idneumatico,fecha,idoperacion,idvehiculo,kilometros,posicion,observaciones) values (?,?,?,?,?,?,?)",array($idneumatico,$fecha,$idoperacion,$idvehiculo,$kilometros,$posicion,$observaciones));
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
