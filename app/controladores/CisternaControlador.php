<?php
class CisternaControlador {

  public function index() {
    $opcion42 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/MaquinasModelo.php";
    $maquinas = MaquinasModelo::getMaquinas();
    require_once "vistas/cisterna/CisternaVista.php";

    $scripts = array("cisterna.js");
    require_once "layouts/layout_foot.php";
  }

  public function validar() {
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if (empty($_POST['litros']) || $_POST['litros']==0)
      echo "- No ha ingresado LITROS.<br>";
    else
      if (!is_numeric($_POST['litros']))
        echo "- Los LITROS deben ser un número.<br>";
    if ($_POST['tipo']==0)
      echo "- No ha seleccionado TIPO DE MOVIMIENTO.<br>";
  }

  public function guardar() {
    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);

    require_once "modelos/CisternaModelo.php";
    $litros = ($_POST['tipo']==2?$_POST['litros']*(-1):$_POST['litros']);
    $id = CisternaModelo::insertCisterna($fecha,$litros,$_POST['observaciones']);
    echo $id;
  }

  public function eliminar() {
    require_once "modelos/CisternaModelo.php";
    $id = CisternaModelo::deleteCisterna($_POST['id']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/CisternaModelo.php";
    $cisterna = CisternaModelo::getCisterna();
    require_once "vistas/cisterna/mostrarRegistros.php";
  }
}
?>
