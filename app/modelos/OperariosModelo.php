<?php 
require_once "modelos/DB.php";

class OperariosModelo {
  public function getOperarios() {
    $consulta = DB::select("select * from operarios order by nombre",null);
    return $consulta;
  }

  public function insertOperario($nombre,$abreviatura) {
    $id = DB::insert("insert into operarios (nombre,abreviatura) values (?,?)",array($nombre,$abreviatura));
    return $id;
  }

  public function deleteOperario($id) {
    $id = DB::delete("delete from operarios where idOperario=?",array($id));
    return $id;
  }
}
?>