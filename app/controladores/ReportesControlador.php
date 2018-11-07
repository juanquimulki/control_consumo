<?php
class ReportesControlador {

  public function planilla() {
    $opcion51 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "modelos/VehiculosModelo.php";
    $vehiculos = VehiculosModelo::getVehiculos();
    
    require_once "vistas/reportes/planilla.php";
    
    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function mostrar() {
    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsulta();
    $inicial = ReportesModelo::getInicial();
    require_once "vistas/reportes/mostrar.php";
  }
  
  public function json() {
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsulta();
    $inicial  = ReportesModelo::getInicial();
    
    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $pordia=$inicial;
      $pordia=$registro['kmshrs']-$pordia;
      $porlt=$pordia/$registro['litros'];

      /*$respuesta["y"][]=$registro['fecha'];
      $respuesta["item1"][]=$porlt;*/
      $respuesta[]=array(y=>$registro['fecha'],item1=>$porlt);

      $porltant = $porlt;
      $inicial=$registro['kmshrs'];
    }
    
    //var_dump($respuesta);
    echo json_encode($respuesta);
  }
}
?>
