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

  public function insertCarga($fecha,$litros,$idparticular,$observaciones,$precio) {
    $id = DB::insert("insert into cargas_part (fecha,litros,idParticular,observaciones,precio) values (?,?,?,?,?)",array($fecha,$litros,$idparticular,$observaciones,$precio));
    return $id;
  }

  public function getCargas() {
    $sql = "select * from cargas_part
              inner join particulares on cargas_part.idParticular=particulares.idParticular
              order by fecha asc,idCargaPart asc";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function deleteCarga($id) {
    $id = DB::delete("delete from cargas_part where idCargaPart=?",array($id));
    return $id;
  }
}
?>
