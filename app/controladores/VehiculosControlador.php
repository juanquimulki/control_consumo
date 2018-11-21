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
  
  public function validar() {
    if (empty($_POST['descripcion']))
      echo "- No ha ingresado DESCRIPCIÓN.<br>";
    if (empty($_POST['iniciales']))
      echo "- No ha ingresado KMS/HRS INICIALES.<br>";
    else 
      if (!is_numeric($_POST['iniciales']))
        echo "- Los KMS/HRS INICIALES deben ser un número.<br>";
  }
  
  public function guardar() {
    require_once "modelos/VehiculosModelo.php";
    $id = VehiculosModelo::insertVehiculo($_POST['codigo'],$_POST['descripcion'],$_POST['iniciales']);
    echo $id;
  }

  public function eliminar() {
    require_once "modelos/VehiculosModelo.php";
    $id = VehiculosModelo::deleteVehiculo($_POST['id']);
    echo $id;
  }
    
  public function mostrar() {
    require_once "modelos/VehiculosModelo.php";
    $vehiculos = VehiculosModelo::getVehiculos();
    require_once "vistas/vehiculos/mostrarRegistros.php";
  }
}
?>
