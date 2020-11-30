<?php
$GLOBALS['SERVER_NAME']="ceramicasgocamaras.ddns.net:8080";

if ($_SERVER['HTTP_HOST']==$GLOBALS['SERVER_NAME']) {
session_start();
error_reporting(0);

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
}
else {
	//echo $_SERVER['HTTP_HOST'];
	echo "<h1>No tiene acceso a esta aplicaci&oacute;n...</h1><br>Si considera que es un error, comun&iacute;quese con su administrador.";
}
?>
