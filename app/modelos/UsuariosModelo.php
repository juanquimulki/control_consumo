<?php 
require_once "modelos/DB.php";

class UsuariosModelo {
  public function getOperarios() {
    $consulta = DB::select("select * from operarios order by nombre",null);
    return $consulta;
  }

  public function insertOperario($nombre,$abreviatura) {
    $id = DB::insert("insert into operarios (nombre,abreviatura) values (?,?)",array($nombre,$abreviatura));
    return $id;
  }

  public function selectUsuario($user) {
    $usuario['user'] = "jmulki";
    $usuario['pass'] = "123456";
    $usuario['nombre'] = "Juan M. Mulki A.";
    return $usuario;
  }
}
?>