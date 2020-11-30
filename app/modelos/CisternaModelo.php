<?php
require_once "modelos/DB.php";

class CisternaModelo {
  public function getCisterna() {
    $sql = "select *, if(litros<0,'EGRESO','INGRESO') as tipo from cisterna
              order by fecha desc";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function selectCisterna($id) {
    $sql   = "select * from cisterna";
    $where = "idCisterna=?"; 
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }  

  public function insertCisterna($fecha,$litros,$observaciones) {
    $id = DB::insert("insert into cisterna (fecha,litros,observaciones) values (?,?,?)",array($fecha,$litros,$observaciones));
    return $id;
  }

  public function deleteCisterna($id) {
    $id = DB::delete("delete from cisterna where idCisterna=?",array($id));
    return $id;
  }

  public function updateCisterna($id,$fecha,$litros,$observaciones) {
    $cantidad = DB::update("update cisterna set fecha=?,litros=?,observaciones=? where idcisterna=?",
    array($fecha,$litros,$observaciones,$id));
    return $cantidad;
  }
}
?>
