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

  public function modificar() {
    require_once "modelos/ItemsModelo.php";
    $registro = ItemsModelo::selectItem($_POST['id']);
    
    echo '{
        "iditem":"'.$registro['idItem'].'",
        "idseccion":"'.$registro['idSeccion'].'",
        "item":"'.$registro['item'].'"
    }';    
  }
  
  public function actualizar() {
    require_once "modelos/ItemsModelo.php";
    $cantidad = ItemsModelo::updateItem($_POST['id'],$_POST['seccion'],$_POST['item']);
    echo $cantidad;  
  }

  public function mostrar() {
    require_once "modelos/ItemsModelo.php";
    $items = ItemsModelo::getItems();
    require_once "vistas/items/mostrarRegistros.php";
  }
}
?>
