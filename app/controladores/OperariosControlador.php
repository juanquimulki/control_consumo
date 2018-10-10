<?php
class OperariosControlador {

  public function index() {
    $opcion21 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/OperariosVista.php";
    
    $scripts = array("operarios.js");
    require_once "layouts/layout_foot.php";
  }
  
}
?>
