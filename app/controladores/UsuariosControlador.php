<?php
class UsuariosControlador {

  public function index() {
    $opcion61 = "active";
    require_once "layouts/layout_head.php";
    
    require_once "modelos/UsuariosModelo.php";
    $perfiles = UsuariosModelo::getPerfiles();
    require_once "vistas/usuarios/UsuariosVista.php";
    
    $scripts = array("usuarios.js");
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
        //if ($usuario['pass']==$_POST['pass']) {
        if ($usuario['pass']==md5($_POST['pass'])) {
          $_SESSION['auth']    = true;
          $_SESSION['user']    = $usuario['user'];
          $_SESSION['pass']    = $usuario['pass'];
          $_SESSION['usuario'] = $usuario['nombre'];
          $_SESSION['perfil']  = $usuario['perfil'];
          
          switch ($usuario['perfil']) {
            case 1:
              $_SESSION['perfil_nombre']="Administrador";
              break;
            case 2:
              $_SESSION['perfil_nombre']="Carga";
              break;
            case 3:
              $_SESSION['perfil_nombre']="Consulta";
              break;
            default:
              $_SESSION['perfil_nombre']="Nivel de Acceso";
              break;
          }
          
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
  
  public function cerrar() {
    session_destroy();
    header("Location: index.php?c=usuarios&a=login");
  }
  
  public function validar() {
    if (empty($_POST['nombre']))
      echo "- No ha ingresado NOMBRE.<br>";
    if (empty($_POST['usuario']))
      echo "- No ha ingresado USUARIO.<br>";
    if ($_POST['perfil']==0)
      echo "- No ha escogido PERFIL.<br>";
  }
  
  public function validarClave() {
    require_once "modelos/UsuariosModelo.php";

    if (empty($_POST['actual']))
      echo "- No ha ingresado CLAVE ACTUAL.<br>";
    else 
      if (md5($_POST['actual'])!=$_SESSION['pass'])
        echo "- La CLAVE ACTUAL no es correcta.<br>"; 
    
    if (empty($_POST['nueva']))
      echo "- No ha ingresado NUEVA CLAVE.<br>";
    if (empty($_POST['confirma']))
      echo "- No ha escogido CONFIRMACIÓN DE CLAVE.<br>";

    if ($_POST['nueva']!=$_POST['confirma'])
      echo "- La NUEVA CLAVE y su CONFIRMACIÓN no coinciden.<br>";
  }

  public function guardar() {
    require_once "modelos/UsuariosModelo.php";
    $id = UsuariosModelo::insertUsuario($_POST['nombre'],$_POST['usuario'],$_POST['perfil']);
    echo $id;
  }
  
  public function guardarClave() {
    require_once "modelos/UsuariosModelo.php";
    $cantidad = UsuariosModelo::updateClave(md5($_POST['nueva']),$_SESSION['user']);
    echo $cantidad;  
  }

  public function eliminar() {
    require_once "modelos/UsuariosModelo.php";
    $id = UsuariosModelo::deleteUsuario($_POST['id']);
    echo $id;
  }
  
  public function mostrar() {
    require_once "modelos/UsuariosModelo.php";
    $usuarios = UsuariosModelo::getUsuarios();
    require_once "vistas/usuarios/mostrarRegistros.php";
  }

  public function clave() {
    require_once "layouts/layout_head.php";
    require_once "vistas/usuarios/cambiarClave.php";
    $scripts = array("usuarios.js");
    require_once "layouts/layout_foot.php";    
  }
}
?>
