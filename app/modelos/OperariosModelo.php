<?php 
include "modelos/DB.php";

class OperariosModelo {
  public function getOperarios() {
    $consulta = DB::consulta("select * from operarios order by nombre",null);
    return $consulta;
  }
}
?>