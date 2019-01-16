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

  public function eliminar() {
    require_once "modelos/ParticularesModelo.php";
    $id = ParticularesModelo::deleteParticular($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/ParticularesModelo.php";
    $particulares = ParticularesModelo::getParticulares();
    require_once "vistas/particulares/mostrarRegistros.php";
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
