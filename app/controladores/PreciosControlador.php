<?php
class PreciosControlador {

  public function index() {
    $opcion22 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/precios/PreciosVista.php";
    
    $scripts = array("precios.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function validar() {
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if (empty($_POST['precio']))
      echo "- No ha ingresado PRECIO.<br>";
    else 
      if (!is_numeric($_POST['precio']))
        echo "- El PRECIO debe ser un número.<br>";
  }

  public function guardar() {
    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/PreciosModelo.php";
    $id = PreciosModelo::insertPrecio($fecha,$_POST['precio']);
    echo $id;
  }

  public function eliminar() {
    require_once "modelos/PreciosModelo.php";
    $id = PreciosModelo::deletePrecio($_POST['id']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/PreciosModelo.php";
    $precios = PreciosModelo::getPrecios();
    require_once "vistas/precios/mostrarRegistros.php";
  }
}
?>
