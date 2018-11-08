<?php 
require_once "modelos/DB.php";

class TableroModelo {
  public function getVehiculos() {
    $consulta = DB::selectCount("vehiculos","idVehiculo");
    $registro = $consulta->fetch();
    return $registro[0];
  }

  public function getOperarios() {
    $consulta = DB::selectCount("operarios","idOperario");
    $registro = $consulta->fetch();
    return $registro[0];
  }

  public function getLitros() {
    $consulta = DB::selectSum("cargas","litros");
    $registro = $consulta->fetch();
    return $registro[0];
  }

  public function getTareas() {
    $consulta = DB::selectCount("trabajos","idTrabajo");
    $registro = $consulta->fetch();
    return $registro[0];
  }
}
?>