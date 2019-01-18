<?php
require_once "modelos/DB.php";

class ReportesModelo {
  public function getConsulta($vehiculo,$desde,$hasta) {
    $sql  = "select * from consulta
              where idVehiculo=? and fecha between ? and ?
              order by fecha";
    $bind = array($vehiculo,$desde,$hasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getConsultaHistorico($desde,$hasta) {
    $sql  = "select month(fecha) as mes, year(fecha) as anio, sum(litros) as litros, sum(precio*litros) as precio from cargas
              where fecha between ? and ?
              group by mes,anio";
    $bind = array($desde,$hasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getConsultaHistcheck($desde,$hasta) {
    $sql  = "select fecha,descripcion,seccion,item,detalles,solucionado,resultados from checklist
              inner join detalles on checklist.idchecklist=detalles.idchecklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join items on detalles.idItem=items.idItem
              inner join secciones on items.idSeccion=secciones.idSeccion
              where fecha BETWEEN ? and ?
              order by fecha";
    $bind = array($desde,$hasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getConsultaParticulares($desde,$hasta) {
    $sql  = "select * from cargas_part
              inner join particulares on cargas_part.idParticular=particulares.idParticular
              where fecha BETWEEN ? and ?
              order by fecha";
    $bind = array($desde,$hasta);
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
