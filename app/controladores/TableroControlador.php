<?php
class TableroControlador {

  public function index() {
    $opcion1 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/TableroModelo.php";
    $vehiculos = TableroModelo::getVehiculos();
    $operarios = TableroModelo::getOperarios();
    $litros    = TableroModelo::getLitros();
    $tareas    = TableroModelo::getTareas();
    
    require_once "vistas/tablero/TableroVista.php";
    require_once "layouts/layout_foot.php";
  }

}
?>
