<?php 
require_once "modelos/DB.php";

class ReportesModelo {
  public function getConsulta() {
    $consulta = DB::select("select * from consulta",null);
    return $consulta;
  }
  
  public function getInicial() {
    $consulta = DB::select("select iniciales from vehiculos where idvehiculo=?",array(6));
    $registro = $consulta->fetch();
    return $registro['iniciales'];
  }
}
?>