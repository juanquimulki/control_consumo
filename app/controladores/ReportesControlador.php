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

    require_once "modelos/Fechas.php";
    $anios = Fechas::get_anios();
    $meses = Fechas::get_meses();
    require_once "vistas/reportes/histcheck.php";

    $scripts = array("reportes.js");
    require_once "layouts/layout_foot.php";
  }

  public function validar() {
    if ($_POST['vehiculo']==0)
      echo "- No ha escogido VEHÍCULO.<br>";

    $desde = $_POST['aniodesde'].$_POST['mesdesde'];
    $hasta = $_POST['aniohasta'].$_POST['meshasta'];
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarHistorico() {
    $desde = $_POST['aniodesde'].$_POST['mesdesde'];
    $hasta = $_POST['aniohasta'].$_POST['meshasta'];
    if ($desde>$hasta)
      echo "- El intervalo de FECHAS no es válido.<br>";
  }

  public function validarHistcheck() {
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
    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsulta($_POST['vehiculo'],$_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);
    $fecha   = $_POST['aniodesde']."/".$_POST['mesdesde']."/01";
    $inicial = ReportesModelo::getInicial($_POST['vehiculo'],$fecha);
    require_once "vistas/reportes/mostrar.php";
  }

  public function mostrarHistorico() {
    require_once "modelos/Fechas.php";
    $meses = Fechas::get_meses();
    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistorico($_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);

    require_once "vistas/reportes/mostrarHistorico.php";
  }

  public function mostrarHistcheck() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_POST['mesdesde'],$_POST['aniodesde']);
    $ultimo  = Fechas::get_ultimo($_POST['meshasta'],$_POST['aniohasta']);
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistcheck($primero,$ultimo);

    require_once "vistas/reportes/mostrarHistcheck.php";
  }

  public function imprimirHistcheck() {
    require_once "modelos/Fechas.php";
    $primero = Fechas::get_primero($_GET['md'],$_GET['ad']);
    $ultimo  = Fechas::get_ultimo($_GET['mh'],$_GET['ah']);
    //echo "$primero $ultimo";

    require_once "modelos/ReportesModelo.php";
    $reporte = ReportesModelo::getConsultaHistcheck($primero,$ultimo);

    require_once "vistas/reportes/imprimirHistcheck.php";
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
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsultaHistorico($_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]=array(y=>$registro['anio']."-".$registro['mes'],item1=>$registro['litros']);
    }

    echo json_encode($respuesta);
  }

  public function json_costos() {
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsultaHistorico($_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);

    $respuesta = array();
    while ($registro = $consulta->fetch()) {
      $respuesta[]=array(y=>$registro['anio']."-".$registro['mes'],item1=>$registro['precio']);
    }

    echo json_encode($respuesta);
  }

  public function json_rendimiento() {
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsulta($_POST['vehiculo'],$_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);
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
    require_once "modelos/ReportesModelo.php";
    $consulta = ReportesModelo::getConsulta($_POST['vehiculo'],$_POST['mesdesde'],$_POST['aniodesde'],$_POST['meshasta'],$_POST['aniohasta']);
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
