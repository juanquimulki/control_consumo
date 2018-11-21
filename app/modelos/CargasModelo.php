<?php 
require_once "modelos/DB.php";

class CargasModelo {
  public function getCargas() {
    $sql = "select * from cargas
              inner join vehiculos on cargas.idVehiculo=vehiculos.idVehiculo
              inner join operarios on cargas.idOperario=operarios.idOperario
              order by fecha asc,idCarga asc";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function insertCarga($fecha,$idvehiculo,$litros,$precinto,$idoperario,$observaciones,$precio) {
    $id = DB::insert("insert into cargas (fecha,idVehiculo,litros,precinto,idOperario,observaciones,precio) values (?,?,?,?,?,?,?)",array($fecha,$idvehiculo,$litros,$precinto,$idoperario,$observaciones,$precio));
    return $id;
  }

  public function deleteCarga($id) {
    $id = DB::delete("delete from cargas where idCarga=?",array($id));
    return $id;
  }
}
?>