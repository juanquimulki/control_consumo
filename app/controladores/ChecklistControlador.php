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
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if ($_POST['idvehiculo']==0)
      echo "- No ha escogido VEHÍCULO.<br>";
    if ($_POST['idoperario']==0)
      echo "- No ha escogido OPERARIO.<br>";
  }
  
  public function guardar() {
    require_once "modelos/UsuariosModelo.php";
    UsuariosModelo::datosComunes($_POST['fecha'],$_POST['idvehiculo'],$_POST['idoperario']);

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/ChecklistModelo.php";
    $id = ChecklistModelo::insertChecklist($fecha,$_POST['idvehiculo'],$_POST['idoperario']);
    echo $id;
  }
  
  public function guardarDetalles() {
    require_once "modelos/ChecklistModelo.php";
    $id = ChecklistModelo::insertDetalles($_POST['idchecklist'],$_POST['iditem'],$_POST['detalles']);    
  }
  
  public function eliminar() {
    require_once "modelos/ChecklistModelo.php";
    $id = ChecklistModelo::deleteChecklist($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/ChecklistModelo.php";
    $checklists = ChecklistModelo::getChecklists();
    require_once "vistas/checklist/mostrarRegistros.php";
  }
  
  public function imprimir() {
    require_once "modelos/ItemsModelo.php";
    $items     = ItemsModelo::getItems();
    require_once "vistas/checklist/imprimirPlanilla.php";    
  }
}
?>
