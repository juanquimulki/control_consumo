<?php 
require_once "modelos/DB.php";

class TrabajosModelo {
  public function getTrabajos() {
    $sql = "select * from trabajos
              inner join vehiculos on trabajos.idVehiculo=vehiculos.idVehiculo
              inner join operarios on trabajos.idOperario=operarios.idOperario
              order by fecha asc,idTrabajo asc";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function insertTrabajo($fecha,$idvehiculo,$kmshrs,$idoperario,$observaciones) {
    $id = DB::insert("insert into trabajos (fecha,idVehiculo,kmshrs,idOperario,observaciones) values (?,?,?,?,?)",array($fecha,$idvehiculo,$kmshrs,$idoperario,$observaciones));
    return $id;
  }
}
?>