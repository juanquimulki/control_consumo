<?php
class TrabajosControlador {

  public function index() {
    $opcion42 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/OperariosModelo.php";
    require_once "modelos/VehiculosModelo.php";
    $operarios = OperariosModelo::getOperarios();
    $vehiculos = VehiculosModelo::getVehiculos();
    require_once "vistas/Trabajos/TrabajosVista.php";
    
    $scripts = array("trabajos.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function guardar() {
    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/TrabajosModelo.php";
    $id = TrabajosModelo::insertTrabajo($fecha,$_POST['idvehiculo'],$_POST['kmshrs'],$_POST['idoperario'],$_POST['observaciones']);
    echo $id;
  }

  public function eliminar() {
    require_once "modelos/TrabajosModelo.php";
    $id = TrabajosModelo::deleteTrabajo($_POST['id']);
    echo $id;
  }
    
  public function mostrar() {
    require_once "modelos/TrabajosModelo.php";
    $trabajos = TrabajosModelo::getTrabajos();
    require_once "vistas/trabajos/mostrarRegistros.php";
  }
}
?>
