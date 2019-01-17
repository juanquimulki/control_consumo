<?php
class ParticularesControlador {

  public function index() {
    $opcion24 = "active";
    require_once "layouts/layout_head.php";

    require_once "vistas/particulares/ParticularesVista.php";

    $scripts = array("particulares.js");
    require_once "layouts/layout_foot.php";
  }

  public function validar() {
    if (empty($_POST['nombre']))
      echo "- No ha ingresado NOMBRE.<br>";
    if (empty($_POST['abreviatura']))
      echo "- No ha ingresado ABREVIATURA.<br>";
  }

  public function guardar() {
    require_once "modelos/ParticularesModelo.php";
    $id = ParticularesModelo::insertParticular($_POST['nombre'],$_POST['abreviatura']);
    echo $id;
  }

  public function validarCarga() {
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if (empty($_POST['litros']) || $_POST['litros']==0)
      echo "- No ha ingresado LITROS.<br>";
    else
      if (!is_numeric($_POST['litros']))
        echo "- Los LITROS deben ser un número.<br>";
    if ($_POST['idparticular']==0)
      echo "- No ha escogido PARTICULAR.<br>";
    if ($_POST['precio']==0)
      echo "- No hay PRECIOS de combustible.<br>";
  }

  public function guardarCarga() {
    /*require_once "modelos/UsuariosModelo.php";
    UsuariosModelo::datosComunes($_POST['fecha'],$_POST['idvehiculo'],$_POST['idoperario']);*/

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/ParticularesModelo.php";
    $id = ParticularesModelo::insertCarga($fecha,$_POST['litros'],$_POST['idparticular'],$_POST['observaciones'],$_POST['precio']);
    echo $id;
  }

  public function eliminar() {
    require_once "modelos/ParticularesModelo.php";
    $id = ParticularesModelo::deleteParticular($_POST['id']);
    echo $id;
  }

  public function eliminarCarga() {
    require_once "modelos/ParticularesModelo.php";
    $id = ParticularesModelo::deleteCarga($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/ParticularesModelo.php";
    $particulares = ParticularesModelo::getParticulares();
    require_once "vistas/particulares/mostrarRegistros.php";
  }

  public function mostrarCargas() {
    require_once "modelos/ParticularesModelo.php";
    $cargas = ParticularesModelo::getCargas();
    require_once "vistas/particulares/mostrarRegistrosCargas.php";
  }

  public function cargas() {
    $opcion44 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/ParticularesModelo.php";
    require_once "modelos/PreciosModelo.php";
    $particulares = ParticularesModelo::getParticulares();
    $precio       = PreciosModelo::getUltPrecio();
    require_once "vistas/particulares/CargasVista.php";

    $scripts = array("particulares.js");
    require_once "layouts/layout_foot.php";
  }
}
?>
