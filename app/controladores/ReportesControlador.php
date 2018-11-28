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
