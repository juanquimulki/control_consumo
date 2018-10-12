<?php
class UsuariosControlador {

  public function index() {
    $opcion21 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "vistas/operarios/OperariosVista.php";
    
    $scripts = array("operarios.js");
    require_once "layouts/layout_foot.php";
  }
  
  public function login() {
    require_once "vistas/usuarios/login.php";
  }
  
  public function autenticar() {
    if ($_POST['user']) {
      require_once "modelos/UsuariosModelo.php";
      $usuario = UsuariosModelo::selectUsuario($_POST['user']);
  
      if ($usuario['user']==$_POST['user']) {
        if ($usuario['pass']==$_POST['pass']) {
          $_SESSION['user']    = $usuario['user'];
          $_SESSION['usuario'] = $usuario['nombre'];
          $_SESSION['desde']   = date("d/m/Y")." - ".date("H:i");

          header("Location: index.php?c=tablero&a=index");
        }
        else {
          header("Location: index.php?c=usuarios&a=login&e=pass");
        }
      }
      else {
        header("Location: index.php?c=usuarios&a=login&e=user");
      }
    }
    else {
      header("Location: index.php?c=usuarios&a=login&e=null");
    }
  }
  
  public function guardar() {
    require_once "modelos/OperariosModelo.php";
    $id = OperariosModelo::insertOperario($_POST['nombre'],$_POST['abreviatura']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/OperariosModelo.php";
    $operarios = OperariosModelo::getOperarios();
    require_once "vistas/operarios/mostrarRegistros.php";
  }
}
?>
