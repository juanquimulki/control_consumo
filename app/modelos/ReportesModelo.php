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
  
  public function getConsultaHistorico($mesdesde,$aniodesde,$meshasta,$aniohasta) {
    $sql  = "select month(fecha) as mes, year(fecha) as anio, sum(litros) as litros, sum(precio*litros) as precio from cargas
              where month(fecha) BETWEEN ? and ? and year(fecha) BETWEEN ? and ?
              group by mes,anio";
    $bind = array($mesdesde,$meshasta,$aniodesde,$aniohasta);
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

  public function getEtiquetas() {
    $sql  = "select * from precios
              order by fecha
              limit 20";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function getDatos() {
    $sql  = "select * from precios
              order by fecha
              limit 20";
    $consulta = DB::select($sql,null);
    return $consulta;
  }
}
?>