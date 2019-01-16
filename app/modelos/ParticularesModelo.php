<?php
require_once "modelos/DB.php";

class ParticularesModelo {
  public function getParticulares() {
    $consulta = DB::select("select * from particulares order by nombre",null);
    return $consulta;
  }

  public function insertParticular($nombre,$abreviatura) {
    $id = DB::insert("insert into particulares (nombre,abreviatura) values (?,?)",array($nombre,$abreviatura));
    return $id;
  }

  public function deleteParticular($id) {
    $id = DB::delete("delete from particulares where idParticular=?",array($id));
    return $id;
  }
}
?>
