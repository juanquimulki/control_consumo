<?php
class TableroControlador {

  public function index() {
    $opcion1 = "active";
    require_once "layouts/layout_head.php";
    require_once "vistas/TableroVista.php";
    require_once "layouts/layout_foot.php";
  }

}
?>
