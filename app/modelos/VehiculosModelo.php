<?php 
include "modelos/DB.php";

class VehiculosModelo {
  public function getVehiculos() {
    $consulta = DB::select("select * from vehiculos order by descripcion",null);
    return $consulta;
  }

  public function insertVehiculo($codigo,$descripcion,$iniciales) {
    $id = DB::insert("insert into vehiculos (idMaquina,descripcion,iniciales) values (?,?,?)",array($codigo,$descripcion,$iniciales));
    return $id;
  }
}
?>