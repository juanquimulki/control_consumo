<?php 
require_once "modelos/DB.php";

class ReportesModelo {
  public function getConsulta($vehiculo,$mesdesde,$aniodesde,$meshasta,$aniohasta) {
    $sql  = "select * from consulta 
              where idVehiculo=? and ((month(fecha) between ? and ?) and (year(fecha) between ? and ?))
              order by fecha";
    $bind = array($vehiculo,$mesdesde,$meshasta,$aniodesde,$aniohasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }
  
  public function getInicial($vehiculo,$fecha) {
    $sql  = "select kmshrs from trabajos 
              where idvehiculo=? and fecha<?
              order by fecha desc, idtrabajo desc";
    $bind = array($vehiculo,$fecha);
    $consulta = DB::select($sql,$bind);
    if ($registro = $consulta->fetch())
      return $registro['kmshrs'];
    else {
      $consulta = DB::select("select iniciales from vehiculos where idvehiculo=?",array($vehiculo));
      $registro = $consulta->fetch();
      return $registro['iniciales'];
    }
  }
}
?>