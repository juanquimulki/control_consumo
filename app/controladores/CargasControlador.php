<?php
class CargasControlador {

  public function index() {
    $opcion41 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/cargas/CargasVista.php";
    
    $scripts = array("cargas.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function guardar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::insertOperario($_POST['nombre'],$_POST['abreviatura']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/OperariosModelo.php";
    $operarios = OperariosModelo::getOperarios();
    require_once "vistas/operarios/mostrarRegistros.php";
  }
}
?>
