<?php
class Fechas {
    function get_meses()
    {
        $meses = array();
        $meses[] = array(1,"Enero");
        $meses[] = array(2,"Febrero");
        $meses[] = array(3,"Marzo");
        $meses[] = array(4,"Abril");
        $meses[] = array(5,"Mayo");
        $meses[] = array(6,"Junio");
        $meses[] = array(7,"Julio");
        $meses[] = array(8,"Agosto");
        $meses[] = array(9,"Septiembre");
        $meses[] = array(10,"Octubre");
        $meses[] = array(11,"Noviembre");
        $meses[] = array(12,"Diciembre");

        return $meses;
    }

    function get_anios()
    {
        $anios = array();
        for ($i=2000;$i<=2100;$i++)
          $anios[]=$i;
        return $anios;
    }

    function fecha_mysql($fecha) {
        $dia = substr($fecha,0,2);
        $mes = substr($fecha,3,2);
        $año = substr($fecha,6,4);
        $fecha_mysql = "$año-$mes-$dia";
        return $fecha_mysql;
    }

    function get_primero($mes,$anio) {
      $primero = "$anio-$mes-1";
      return $primero;
    }

    function get_ultimo($mes,$anio) {
      $ultimo = date("d",(mktime(0,0,0,$mes+1,1,$anio)-1));
      $ultimo = "$anio-$mes-$ultimo";
      return $ultimo;
    }
}
?>
