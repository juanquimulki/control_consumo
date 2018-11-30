<?php 
require_once "modelos/DB.php";

class UsuariosModelo {
  public function getUsuarios() {
    $consulta = DB::select("select * from usuarios order by nombre",null);
    return $consulta;
  }

  public function insertUsuario($nombre,$usuario,$perfil) {
    $password = md5("1234");
    $id = DB::insert("insert into usuarios (nombre,user,pass,perfil) values (?,?,?,?)",array($nombre,$usuario,$password,$perfil));
    return $id;
  }

  public function deleteUsuario($id) {
    $id = DB::delete("delete from usuarios where idUsuario=?",array($id));
    return $id;
  }
  
  public function selectUsuario($user) {
    $usuario['user'] = "jmulki";
    $usuario['pass'] = "123456";
    $usuario['nombre'] = "Juan M. Mulki A.";
    return $usuario;
  }
  
  public function getPerfiles() {
    $perfiles = array();
    $perfiles[] = array(1,"Administrador");
    $perfiles[] = array(2,"Carga");
    $perfiles[] = array(3,"Consulta");
    return $perfiles;
  }
}
?>