<?php
require_once "modelos/DB.php";

class CisternaModelo {
  public function getCisterna() {
    $sql = "select *, if(litros<0,'EGRESO','INGRESO') as tipo from cisterna
              order by fecha desc";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function insertCisterna($fecha,$litros,$observaciones) {
    $id = DB::insert("insert into cisterna (fecha,litros,observaciones) values (?,?,?)",array($fecha,$litros,$observaciones));
    return $id;
  }

  public function deleteCisterna($id) {
    $id = DB::delete("delete from cisterna where idCisterna=?",array($id));
    return $id;
  }
}
?>
