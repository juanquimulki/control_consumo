<?php
session_start("cc");

$controlador = ucfirst($_GET['c'])."Controlador";
$accion      = $_GET['a'];

require_once "controladores/$controlador.php";

call_user_func(array($controlador,$accion));
?>
