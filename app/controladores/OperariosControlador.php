<?php
class OperariosControlador {

  public function index() {
    $opcion21 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/operarios/OperariosVista.php";
    
    $scripts = array("operarios.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function validar() {
    if (empty($_POST['nombre']))
      echo "- No ha ingresado NOMBRE.<br>";
    if (empty($_POST['abreviatura']))
      echo "- No ha ingresado ABREVIATURA.<br>";
  }
  
  public function guardar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::insertOperario($_POST['nombre'],$_POST['abreviatura']);
    echo $id;
  }
  
  public function eliminar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::deleteOperario($_POST['id']);
    echo $id;
  }

  public function modificar() {
    require_once "modelos/OperariosModelo.php";
    $registro = OperariosModelo::selectOperario($_POST['id']);
    
    echo '{
        "idoperario":"'.$registro['idOperario'].'",
        "nombre":"'.$registro['nombre'].'",
        "abreviatura":"'.$registro['abreviatura'].'"
    }';    
  }
  
  public function actualizar() {
    require_once "modelos/OperariosModelo.php";
    $cantidad = OperariosModelo::updateOperario($_POST['id'],$_POST['nombre'],$_POST['abreviatura']);
    echo $cantidad;  
  }
  
  public function mostrar() {
    require_once "modelos/OperariosModelo.php";
    $operarios = OperariosModelo::getOperarios();
    require_once "vistas/operarios/mostrarRegistros.php";
  }
}
?>
