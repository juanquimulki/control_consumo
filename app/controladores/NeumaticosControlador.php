<?php
class NeumaticosControlador {

  public function index() {
    $opcion81 = "active";
    require_once "layouts/layout_head.php";

    require_once "vistas/neumaticos/NeumaticosVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function historial() {
    $opcion82 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $neumaticos = NeumaticosModelo::getNeumaticos();
    $operaciones = NeumaticosModelo::getOperaciones();
    require_once "modelos/VehiculosModelo.php";
    $camiones = VehiculosModelo::getCamiones();
    require_once "vistas/neumaticos/HistorialVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }

  public function validar() {
    if (empty($_POST['codigo']))
      echo "- No ha ingresado CÓDIGO.<br>";
    if (empty($_POST['marca']))
      echo "- No ha ingresado MARCA.<br>";
    if (empty($_POST['modelo']))
      echo "- No ha ingresado MODELO.<br>";
    if ($_POST['estado']==0)
      echo "- No ha escogido ESTADO.<br>";
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if (empty($_POST['precio']))
      echo "- No ha ingresado PRECIO.<br>";
    else
      if (!is_numeric($_POST['precio']))
        echo "- El PRECIO debe ser un número.<br>";
    if (empty($_POST['kilometros']))
      echo "- No ha ingresado KILÓMETROS.<br>";
    else
      if (!is_numeric($_POST['kilometros']))
        echo "- Los KILÓMETROS deben ser un número.<br>";
  }
  
  public function validarHistorial() {
    if ($_POST['idneumatico']==0)
      echo "- No ha escogido NEUMÁTICO.<br>";
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if ($_POST['idoperacion']==0)
      echo "- No ha escogido OPERACIÓN.<br>";
    if ($_POST['idvehiculo']==0)
      echo "- No ha escogido VEHÍCULO.<br>";
    if (empty($_POST['kilometros']))
      echo "- No ha ingresado KILÓMETROS.<br>";
    else
      if (!is_numeric($_POST['kilometros']))
        echo "- Los KILÓMETROS deben ser un número.<br>";
    if (empty($_POST['posicion']))
      echo "- No ha ingresado POSICIÓN.<br>";
    else
      if (!is_numeric($_POST['posicion']))
        echo "- La POSICIÓN debe ser un número.<br>";
  }

  public function guardar() {
    require_once "modelos/NeumaticosModelo.php";

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/NeumaticosModelo.php";
    $id = NeumaticosModelo::insertNeumatico($_POST['codigo'],$_POST['marca'],$_POST['modelo'],$_POST['medida'],$_POST['estado'],$fecha,$_POST['precio'],$_POST['kilometros'],$_POST['observaciones']);
    echo $id;
    NeumaticosModelo::insertHistorial($id,date("Y-m-d"),1,0,$_POST['kilometros'],0,"");
  }

  public function guardarHistorial() {
    require_once "modelos/NeumaticosModelo.php";

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/NeumaticosModelo.php";
    $id = NeumaticosModelo::insertHistorial($_POST['idneumatico'],$fecha,$_POST['idoperacion'],$_POST['idvehiculo'],$_POST['kilometros'],$_POST['posicion'],$_POST['observaciones']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/NeumaticosModelo.php";
    $neumaticos = NeumaticosModelo::getNeumaticos();
    require_once "vistas/neumaticos/mostrarRegistros.php";
  }

  public function mostrarHistorial() {
    require_once "modelos/NeumaticosModelo.php";
    $historial = NeumaticosModelo::getHistorial($_POST['id']);
    require_once "vistas/neumaticos/mostrarRegistrosHistorial.php";
  }

  public function modificar() {
    require_once "modelos/NeumaticosModelo.php";
    $registro = NeumaticosModelo::selectNeumatico($_POST['id']);

    echo '{
        "idneumatico":"'.$registro['idNeumatico'].'",
        "codigo":"'.$registro['codigo'].'",
        "marca":"'.$registro['marca'].'",
        "modelo":"'.$registro['modelo'].'",
        "medida":"'.$registro['medida'].'",
        "estado":"'.$registro['estado'].'",
        "fecha":"'.date("d/m/Y",strtotime($registro['fecha'])).'",
        "precio":"'.$registro['precio'].'",
        "kilometros":"'.$registro['kilometros'].'",
        "observaciones":"'.$registro['observaciones'].'"
    }';
  }

}
?>
