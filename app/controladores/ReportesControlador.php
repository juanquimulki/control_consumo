<?php
class ReportesControlador {

  public function planilla() {
    $opcion51 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "modelos/VehiculosModelo.php";
    $vehiculos = VehiculosModelo::getVehiculos();

    require_once "vistas/reportes/planilla.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function precios() {
    $opcion52 = "active";
    require_once "layouts/layout_head.php";

    require_once "vistas/reportes/precios.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function historico() {
    $opcion53 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "vistas/reportes/historico.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function checklist() {
    $opcion54 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "modelos/VehiculosModelo.php";
    $vehiculos = VehiculosModelo::getVehiculos();
    require_once "vistas/reportes/checklists.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function histcheck() {
    $opcion55 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/VehiculosModelo.php";
    $vehiculos = VehiculosModelo::getVehiculos();
    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "vistas/reportes/histcheck.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function particulares() {
    $opcion56 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "vistas/reportes/particulares.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function cisterna() {
    $opcion57 = "active";
    require_once "layouts/layout_head.php";

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "vistas/reportes/cisterna.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function validar() {
    if ($_POST['vehiculo']==0)
      echo "- No ha escogido VEHÍCULO.<br>";

    $mesdesde = $_POST['mesdesde'];
    $meshasta = $_POST['meshasta'];

    if ($mesdesde<10) $mesdesde = "0$mesdesde";
    if ($meshasta<10) $meshasta = "0$meshasta";

    $desde = $_POST['aniodesde'].$mesdesde;
    $hasta = $_POST['aniohasta'].$meshasta;
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarHistorico() {
    $mesdesde = $_POST['mesdesde'];
    $meshasta = $_POST['meshasta'];

    if ($mesdesde<10) $mesdesde = "0$mesdesde";
    if ($meshasta<10) $meshasta = "0$meshasta";

    $desde = $_POST['aniodesde'].$mesdesde;
    $hasta = $_POST['aniohasta'].$meshasta;
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarHistcheck() {
    require_once "modelos/Fechas.php";
    
    if (empty($_POST['desde']))
      echo "- No ha ingresado FECHA DESDE.<br>";
    if (empty($_POST['hasta']))
      echo "- No ha ingresado FECHA HASTA.<br>";
    
    $desde = Fechas::fecha_mysql($_POST['desde']);
    $hasta = Fechas::fecha_mysql($_POST['hasta']);
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";

    /*$mesdesde = $_POST['mesdesde'];
    $meshasta = $_POST['meshasta'];

    if ($mesdesde<10) $mesdesde = "0$mesdesde";
    if ($meshasta<10) $meshasta = "0$meshasta";

    $desde = $_POST['aniodesde'].$mesdesde;
    $hasta = $_POST['aniohasta'].$meshasta;*/

  }

  public function validarParticulares() {
    $mesdesde = $_POST['mesdesde'];
    $meshasta = $_POST['meshasta'];

    if ($mesdesde<10) $mesdesde = "0$mesdesde";
    if ($meshasta<10) $meshasta = "0$meshasta";

    $desde = $_POST['aniodesde'].$mesdesde;
    $hasta = $_POST['aniohasta'].$meshasta;
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarCisterna() {
    $mesdesde = $_POST['mesdesde'];
    $meshasta = $_POST['meshasta'];

    if ($mesdesde<10) $mesdesde = "0$mesdesde";
    if ($meshasta<10) $meshasta = "0$meshasta";

    $desde = $_POST['aniodesde'].$mesdesde;
    $hasta = $_POST['aniohasta'].$meshasta;
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarChecklist() {
    if ($_POST['idvehiculo']==0)
      echo "- No ha escogido VEHÍCULO.<br>";
  }

  public function mostrar() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsulta($_POST['vehiculo'],$primero,$ultimo);
    $fecha   = $_POST['aniodesde']."/".$_POST['mesdesde']."/01";
    $inicial = ReportesModelo::getInicial($_POST['vehiculo'],$fecha);
    require_once "vistas/reportes/mostrar.php";
  }

  public function mostrarHistorico() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    $meses = Fechas::get_meses();
    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistorico($primero,$ultimo);

    require_once "vistas/reportes/mostrarHistorico.php";
  }

  public function mostrarHistcheck() {
    require_once "modelos/Fechas.php";
    $desde = Fechas::fecha_mysql($_POST['desde']);
    $hasta = Fechas::fecha_mysql($_POST['hasta']);
    $idvehiculo  = $_POST['idvehiculo'];
    $solucionado = $_POST['solucionado'];
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistcheck($desde,$hasta,$idvehiculo,$solucionado);

    require_once "vistas/reportes/mostrarHistcheck.php";
  }

  public function mostrarParticulares() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaParticulares($primero,$ultimo);

    require_once "vistas/reportes/mostrarParticulares.php";
  }

  public function mostrarCisterna() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $ingresos = ReportesModelo::getIngresosCisterna($primero,$ultimo);
    $egresos  = ReportesModelo::getEgresosCisterna($primero,$ultimo);
    $anterior = ReportesModelo::getAnteriorCisterna($primero);

    require_once "vistas/reportes/mostrarCisterna.php";
  }

  public function imprimirHistcheck() {
    require_once "modelos/Fechas.php";
    $desde = Fechas::fecha_mysql($_GET['d']);
    $hasta = Fechas::fecha_mysql($_GET['h']);
    $idvehiculo  = $_GET['v'];
    $solucionado = $_GET['s'];
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistcheck($desde,$hasta,$idvehiculo,$solucionado);

    require_once "vistas/reportes/imprimirHistcheck.php";
  }

  public function imprimirPlanilla() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_GET['md'],$_GET['ad']);
    $ultimo  = Fechas::get_ultimo($_GET['mh'],$_GET['ah']);

    $desde = $primero;
    $hasta = $ultimo;

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsulta($_GET['v'],$primero,$ultimo);
    $fecha   = $_GET['ad']."/".$_GET['md']."/01";
    $inicial = ReportesModelo::getInicial($_GET['v'],$fecha);
    
    $vehiculo = $_GET['n'];
    require_once "vistas/reportes/imprimirPlanilla.php";
  }
  
  public function imprimirHistorico() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_GET['md'],$_GET['ad']);
    $ultimo  = Fechas::get_ultimo($_GET['mh'],$_GET['ah']);

    $desde = $primero;
    $hasta = $ultimo;

    $meses = Fechas::get_meses();
    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistorico($primero,$ultimo);

    require_once "vistas/reportes/imprimirHistorico.php";
  }
  
  public function mostrarChecklist() {
    $mes  = $_POST['mesdesde'];
    $anio = $_POST['aniodesde'];
    $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

    require_once "modelos/ItemsModelo.php";
    require_once "modelos/ChecklistModelo.php";
    $items = ItemsModelo::getItems();

    $arreglo = array();
    $solucionado = array();
    while ($registro = $items->fetch()) {
      $fila = array();
      $fila[] = $registro['seccion'].": ".$registro['item'];
      for ($i=1;$i<=$dias;$i++) {
        $fecha   = $anio."-".$mes."-".$i;
        $novedad = ChecklistModelo::getNovedad($registro['idItem'],$fecha);
        if ($nov = $novedad->fetch()) {
          $fila[] = $nov['idDetalle'];
          $solucionado[] = $nov['solucionado'];
        }
        else {
          $fila[] = 0;
        }
      }
      $arreglo[] = $fila;
    }

    require_once "vistas/reportes/mostrarChecklist.php";
  }

  public function detalles() {
    require_once "modelos/ChecklistModelo.php";
    $detalles = ChecklistModelo::getDetalles($_POST['iddetalle']);
    $registro = $detalles->fetch();
    require_once "vistas/reportes/mostrarDetalles.php";
  }

  public function solucionar() {
    require_once "modelos/ChecklistModelo.php";
    ChecklistModelo::solucionarDetalles($_POST['iddetalle'],$_POST['resultados']);
  }

  public function ticket() {
    require_once "modelos/ChecklistModelo.php";
    $detalles = ChecklistModelo::getDetalles($_GET['id']);
    $registro = $detalles->fetch();
    require_once "vistas/reportes/ticket.php";
  }

  public function json_litros() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsultaHistorico($primero,$ultimo);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]=array(y=>$registro['anio']."-".$registro['mes'],item1=>$registro['litros']);
    }

    echo json_encode($respuesta);
  }

  public function json_costos() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsultaHistorico($primero,$ultimo);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]=array(y=>$registro['anio']."-".$registro['mes'],item1=>$registro['precio']);
    }

    echo json_encode($respuesta);
  }

  public function json_rendimiento() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsulta($_POST['vehiculo'],$primero,$ultimo);
    $fecha   = $_POST['aniodesde']."/".$_POST['mesdesde']."/01";
    $inicial = ReportesModelo::getInicial($_POST['vehiculo'],$fecha);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $pordia=$inicial;
      $pordia=$registro['kmshrs']-$pordia;
      $porlt=$pordia/$registro['litros'];

      $respuesta[]=array(y=>$registro['fecha'],item1=>number_format($porlt,2));

      $porltant = $porlt;
      $inicial=$registro['kmshrs'];
    }

    echo json_encode($respuesta);
  }

  public function json_carga() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);

    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsulta($_POST['vehiculo'],$primero,$ultimo);
    $fecha   = $_POST['aniodesde']."/".$_POST['mesdesde']."/01";
    $inicial = ReportesModelo::getInicial($_POST['vehiculo'],$fecha);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $pordia=$inicial;
      $pordia=$registro['kmshrs']-$pordia;

      $respuesta[]=array(y=>$registro['fecha'],item1=>$pordia);

      $inicial=$registro['kmshrs'];
    }

    echo json_encode($respuesta);
  }

  public function json_etiquetas() {
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getEtiquetas();

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]= date("d/m/Y",strtotime($registro['fecha']));
    }

    echo json_encode($respuesta);
  }

  public function json_datos() {
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getDatos();

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]=$registro['precio'];
    }

    echo json_encode($respuesta);
  }
}
?>
