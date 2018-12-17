<?php
class ItemsControlador {

  public function index() {
    $opcion23 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/ItemsModelo.php";
    $secciones = ItemsModelo::getSecciones();
    require_once "vistas/items/ItemsVista.php";
    
    $scripts = array("items.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function validar() {
    if (empty($_POST['nombre']))
      echo "- No ha ingresado NOMBRE.<br>";
    if (empty($_POST['abreviatura']))
      echo "- No ha ingresado ABREVIATURA.<br>";
  }
  
  public function guardar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::insertOperario($_POST['nombre'],$_POST['abreviatura']);
    echo $id;
  }
  
  public function eliminar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::deleteOperario($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/ItemsModelo.php";
    $items = ItemsModelo::getItems();
    require_once "vistas/items/mostrarRegistros.php";
  }
}
?>
