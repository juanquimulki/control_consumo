<?php
class ChecklistControlador {

  public function index() {
    $opcion43 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/OperariosModelo.php";
    require_once "modelos/VehiculosModelo.php";
    require_once "modelos/ItemsModelo.php";
    $operarios = OperariosModelo::getOperarios();
    $vehiculos = VehiculosModelo::getVehiculos();
    $items     = ItemsModelo::getItems();
    require_once "vistas/checklist/ChecklistVista.php";
    
    $scripts = array("checklist.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function validar() {
    if ($_POST['seccion']==0)
      echo "- No ha escogido SECCIÓN.<br>";
    if (empty($_POST['item']))
      echo "- No ha ingresado DESCRIPCIÓN.<br>";
  }
  
  public function guardar() {
    require_once "modelos/ItemsModelo.php";
    $id = ItemsModelo::insertItem($_POST['seccion'],$_POST['item']);
    echo $id;
  }
  
  public function eliminar() {
    require_once "modelos/ItemsModelo.php";
    $id = ItemsModelo::deleteItem($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/ItemsModelo.php";
    $items = ItemsModelo::getItems();
    require_once "vistas/items/mostrarRegistros.php";
  }
}
?>
