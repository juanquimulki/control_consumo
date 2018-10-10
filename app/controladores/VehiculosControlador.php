<?php
class VehiculosControlador {

  public function index() {
    $opcion3 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/MaquinasModelo.php";
    $maquinas = MaquinasModelo::getMaquinas();
    require_once "vistas/vehiculos/VehiculosVista.php";
    
    $scripts = array("vehiculos.js");
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
