<?php
class NeumaticosControlador {

  public function index() {
    $opcion81 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $estados = NeumaticosModelo::getEstados();
    require_once "vistas/neumaticos/NeumaticosVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function ubicacion() {
    $opcion831 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $neumaticos = NeumaticosModelo::getNeumaticos();
    require_once "modelos/VehiculosModelo.php";
    $camiones = VehiculosModelo::getCamiones();
    require_once "vistas/neumaticos/UbicacionVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function stock() {
    $opcion832 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $destinos   = NeumaticosModelo::getDestinos();
    $neumaticos = NeumaticosModelo::getStock();
    require_once "vistas/neumaticos/StockVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }

  public function ultimo() {
    $opcion833 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $ultimos = NeumaticosModelo::getUltimos();
    $algunos = NeumaticosModelo::getAlgunos();
    require_once "vistas/neumaticos/UltimoVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }

  public function historial() {
    $opcion82 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $neumaticos  = NeumaticosModelo::getNeumaticos();
    $operaciones = NeumaticosModelo::getOperaciones();
    $destinos    = NeumaticosModelo::getDestinos();
    require_once "modelos/VehiculosModelo.php";
    $camiones = VehiculosModelo::getCamiones();
    require_once "vistas/neumaticos/HistorialVista.php";

    $scripts = array("neumaticos.js");
    require_once "layouts/layout_foot.php";
  }

  public function rodaje() {
    $opcion834 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/NeumaticosModelo.php";
    $neumaticos  = NeumaticosModelo::getNeumaticos();
    require_once "vistas/neumaticos/RodajeVista.php";

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
    if (empty($_POST['proveedor']))
      echo "- No ha ingresado PROVEEDOR.<br>";
    if (empty($_POST['fecha']))
      echo "- No ha ingresado FECHA.<br>";
    if (empty($_POST['precio']))
      echo "- No ha ingresado PRECIO.<br>";
    else
      if (!is_numeric($_POST['precio']))
        echo "- El PRECIO debe ser un número.<br>";
    /*if (empty($_POST['kilometros']))
      echo "- No ha ingresado KILÓMETROS.<br>";
    else*/
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
    else
      if (NeumaticosControlador::validarOperacionHist($_POST['idneumatico'],$_POST['idoperacion'])) {
        if ($_POST['idoperacion']==4) { //recapado
            if (NeumaticosControlador::contarRecapados($_POST['idneumatico'])>=2)
              echo "- LA CUBIERTA YA NO PUEDE SER RECAPADA.<br>";
            else {}
        }
      }
      else
        echo "- LA OPERACIÓN NO ES VÁLIDA PARA ESTA CUBIERTA EN SU CONTEXTO.<br>";
    if ($_POST['idoperacion']==3 && $_POST['destino']==0)
      echo "- No ha escogido DESTINO.<br>";
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

  public function validarOperacionHist($idneu,$idope) {
    require_once "modelos/NeumaticosModelo.php";
    $registro = NeumaticosModelo::selectUltimoHist($idneu);
    $ultope   = $registro['idOperacion'];
    
    switch ($idope) {
      case 2: //colocado
        if (in_array($ultope,array(1,3,4)))
          return true;
        else
          return false;
        break;
      case 3: //quitado
        if (in_array($ultope,array(2)))
          return true;
        else
          return false;
        break;
      case 4: //recapado
        if (in_array($ultope,array(3)))
          return true;
        else
          return false;
        break;
      case 5: //descartado
        if (in_array($ultope,array(3,4)))
          return true;
        else
          return false;
        break;
    }
    
    return false;
  }
  
  public function contarRecapados($id) {
    require_once "modelos/NeumaticosModelo.php";
    $neumatico = NeumaticosModelo::selectNeumatico($id);
    
    $cuenta = 0;
    if ($neumatico['estado']==3) $cuenta=1;
    else if ($neumatico['estado']==4) $cuenta=2;
    
    $recapados = NeumaticosModelo::getRecapados($id);
    $cuenta = $cuenta + $recapados;
    return $cuenta;
  }

  public function guardar() {
    require_once "modelos/NeumaticosModelo.php";

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/NeumaticosModelo.php";
    $id = NeumaticosModelo::insertNeumatico($_POST['codigo'],$_POST['marca'],$_POST['modelo'],$_POST['medida'],$_POST['estado'],$_POST['proveedor'],$fecha,$_POST['precio'],$_POST['kilometros'],$_POST['observaciones']);
    echo $id;
    //$idneumatico,$fecha,$idoperacion,$destino,$idvehiculo,$kilometros,$posicion,$observaciones
    NeumaticosModelo::insertHistorial($id,date("Y-m-d"),1,0,0,$_POST['kilometros'],0,"");
  }

  public function guardarHistorial() {
    require_once "modelos/NeumaticosModelo.php";

    require_once "modelos/Fechas.php";
    $fecha = Fechas::fecha_mysql($_POST['fecha']);
    require_once "modelos/NeumaticosModelo.php";
    $id = NeumaticosModelo::insertHistorial($_POST['idneumatico'],$fecha,$_POST['idoperacion'],$_POST['destino'],$_POST['idvehiculo'],$_POST['kilometros'],$_POST['posicion'],$_POST['observaciones']);
    echo $id;
  }

  public function mostrar() {
    require_once "modelos/NeumaticosModelo.php";
    $neumaticos = NeumaticosModelo::getNeumaticos();
    require_once "vistas/neumaticos/mostrarRegistros.php";
  }

  public function mostrarRodaje() {
    require_once "modelos/NeumaticosModelo.php";
    $actuales = $_POST['actuales'];
    $movimientos  = NeumaticosModelo::getHistorialRodaje($_POST['id']);
    require_once "vistas/neumaticos/mostrarRodaje.php";
  }

  public function mostrarHistorial() {
    require_once "modelos/NeumaticosModelo.php";
    $destinos  = NeumaticosModelo::getDestinos();
    $historial = NeumaticosModelo::getHistorial($_POST['id']);
    $neumatico = NeumaticosModelo::selectNeumatico($_POST['id']);
    require_once "vistas/neumaticos/mostrarRegistrosHistorial.php";
  }

  public function mostrarUbicacion() {
    require_once "modelos/NeumaticosModelo.php";
    if ($_POST['idn']) {
      $consulta = NeumaticosModelo::getUbicacionNeumatico($_POST['idn']);
      if ($neumatico=$consulta->fetch()) {
        $idvehiculo = $neumatico['idVehiculo'];
        $codigo = $neumatico['codigo'];
      }
      else {
        $idvehiculo = 0;
        $codigo = "";
      }
    }
    else {
      $idvehiculo = $_POST['idv'];
      $codigo = "";
    }

    $arreglo = NeumaticosModelo::getUbicacionVehiculo($idvehiculo);
    require_once "modelos/VehiculosModelo.php";
    $vehiculo = VehiculosModelo::selectVehiculo($idvehiculo); 
    require_once "vistas/neumaticos/mostrarUbicacion.php";
  }
  
  public function infoNeuma() {
    require_once "modelos/NeumaticosModelo.php";
    $id = NeumaticosModelo::getId($_POST['codigo']);
    $neumatico = NeumaticosModelo::selectNeumatico($id);
    $historial = NeumaticosModelo::getHistorial($id);
    require_once "vistas/neumaticos/infoNeuma.php";
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
        "proveedor":"'.$registro['proveedor'].'",
        "fecha":"'.date("d/m/Y",strtotime($registro['fecha'])).'",
        "precio":"'.$registro['precio'].'",
        "kilometros":"'.$registro['kilometros'].'",
        "observaciones":"'.$registro['observaciones'].'"
    }';
  }

}
?>
