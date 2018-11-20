<?php
class PreciosControlador {

  public function index() {
    $opcion22 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/precios/PreciosVista.php";
    
    $scripts = array("precios.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function guardar() {
    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/PreciosModelo.php";
    $id = PreciosModelo::insertPrecio($fecha,$_POST['precio']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/PreciosModelo.php";
    $precios = PreciosModelo::getPrecios();
    require_once "vistas/precios/mostrarRegistros.php";
  }
}
?>
