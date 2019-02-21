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

  public function getConsultaHistcheck($desde,$hasta,$idvehiculo,$solucionado) {
    $where = "";
    if ($idvehiculo)
      $where .= " and vehiculos.idvehiculo=$idvehiculo";
    if ($solucionado)
      $where .= " and detalles.solucionado is not null";
    
    $sql  = "select fecha,descripcion,seccion,item,detalles,solucionado,resultados from checklist
              inner join detalles on checklist.idchecklist=detalles.idchecklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join items on detalles.idItem=items.idItem
              inner join secciones on items.idSeccion=secciones.idSeccion
              where fecha BETWEEN ? and ? $where
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

  public function getIngresosCisterna($desde,$hasta) {
    $sql  = "select * from cisterna
              where fecha BETWEEN ? and ? and litros>=0
              order by fecha, idCisterna";
    $bind = array($desde,$hasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getEgresosCisterna($desde,$hasta) {
    $sql  = "select fecha,litros*(-1) as litros,observaciones,'EGRESO' as tipo from cisterna
              where fecha BETWEEN ? and ? and litros<0
            union
            select fecha,litros,observaciones,'CARGA' as tipo from cargas
              where fecha BETWEEN ? and ?
            union
            select fecha,litros,observaciones,'PARTICULAR' as tipo from cargas_part
              where fecha BETWEEN ? and ?
            order by fecha";
    $bind = array($desde,$hasta,$desde,$hasta,$desde,$hasta);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getAnteriorCisterna($desde) {
    $sql  = "select sum(litros) as ingresos from cisterna
              where fecha < ? and litros>=0";
    $bind = array($desde);
    $consulta = DB::select($sql,$bind);
    $registro = $consulta->fetch();
    //echo "ingresos ".$registro['ingresos']." ".$desde;
    $ingresos = $registro['ingresos'];

    $sql  = "select sum(litros) as egresos from
            (select litros*(-1) as litros from cisterna
              where fecha < ? and litros<0
            union
            select litros from cargas
              where fecha < ?
            union
            select litros from cargas_part
              where fecha < ?) as tabla";
    $bind = array($desde,$desde,$desde);
    $consulta = DB::select($sql,$bind);
    $registro = $consulta->fetch();
    //echo "egresos ".$registro['egresos']." ".$desde;
    $egresos = $registro['egresos'];

    return $ingresos - $egresos;
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
