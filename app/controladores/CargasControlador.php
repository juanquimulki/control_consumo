<?php
class CargasControlador {

  public function index() {
    $opcion41 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/OperariosModelo.php";
    require_once "modelos/VehiculosModelo.php";
    require_once "modelos/PreciosModelo.php";
    $operarios = OperariosModelo::getOperarios();
    $vehiculos = VehiculosModelo::getVehiculos();
    $precio    = PreciosModelo::getUltPrecio();
    require_once "vistas/cargas/CargasVista.php";
    
    $scripts = array("cargas.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function guardar() {
    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/CargasModelo.php";
    $id = CargasModelo::insertCarga($fecha,$_POST['idvehiculo'],$_POST['litros'],$_POST['precinto'],$_POST['idoperario'],$_POST['observaciones'],$_POST['precio']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/CargasModelo.php";
    $cargas = CargasModelo::getCargas();
    require_once "vistas/cargas/mostrarRegistros.php";
  }
}
?>
