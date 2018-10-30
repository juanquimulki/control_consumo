<?php
session_start("cc");

//BLOQUE DE SEGURIDAD
if (($_GET['c']=="usuarios") && ($_GET['a']=="login")) {}
else {
  if ($_SESSION['auth']) {}
  else {
    header("Location: index.php?c=usuarios&a=login&e=session");
  }
}
//FIN BLOQUE DE SEGURIDAD

$controlador = ucfirst($_GET['c'])."Controlador";
$accion      = $_GET['a'];

require_once "controladores/$controlador.php";

call_user_func(array($controlador,$accion));
?>
