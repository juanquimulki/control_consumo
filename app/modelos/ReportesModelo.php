<?php 
require_once "modelos/DB.php";

class ReportesModelo {
  public function getConsulta($vehiculo,$mesdesde,$aniodesde,$meshasta,$aniohasta) {
    $sql = "select * from consulta 
              where idVehiculo=? and ((month(fecha) between ? and ?) and (year(fecha) between ? and ?))
              order by fecha";
    $bind = array($vehiculo,$mesdesde,$meshasta,$aniodesde,$aniohasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }
  
  public function getInicial() {
    $consulta = DB::select("select iniciales from vehiculos where idvehiculo=?",array(6));
    $registro = $consulta->fetch();
    return $registro['iniciales'];
  }
}
?>