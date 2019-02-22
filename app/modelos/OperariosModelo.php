<?php 
require_once "modelos/DB.php";

class OperariosModelo {
  public function getOperarios() {
    $consulta = DB::select("select * from operarios order by nombre",null);
    return $consulta;
  }

  public function selectOperario($id) {
    $sql   = "select * from operarios";
    $where = "idOperario=?"; 
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }
  
  public function insertOperario($nombre,$abreviatura) {
    $id = DB::insert("insert into operarios (nombre,abreviatura) values (?,?)",array($nombre,$abreviatura));
    return $id;
  }

  public function updateOperario($id,$nombre,$abreviatura) {
    $cantidad = DB::update("update operarios set nombre=?,abreviatura=? where idoperario=?",
      array($nombre,$abreviatura,$id));
    return $cantidad;
  }

  public function deleteOperario($id) {
    $id = DB::delete("delete from operarios where idOperario=?",array($id));
    return $id;
  }
}
?>