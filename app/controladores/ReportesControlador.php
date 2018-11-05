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
}
?>
