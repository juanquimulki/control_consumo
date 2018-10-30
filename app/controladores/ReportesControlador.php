<?php
class ReportesControlador {

  public function planilla() {
    $opcion51 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/reportes/planilla.php";
    
    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }
}
?>
