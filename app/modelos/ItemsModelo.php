<?php 
require_once "modelos/DB.php";

class ItemsModelo {
  public function getSecciones() {
    $consulta = DB::select("select * from secciones order by idSeccion",null);
    return $consulta;
  }
  
  public function selectItem($id) {
    $sql   = "select * from items";
    $where = "idItem=?"; 
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }
  
  public function getItems() {
    $sql = "select * from items 
              inner join secciones on items.idseccion=secciones.idseccion
              order by secciones.idseccion,iditem";
    $consulta = DB::select($sql,null);
    return $consulta;
  }  

  public function insertItem($seccion,$item) {
    $id = DB::insert("insert into items (idseccion,item) values (?,?)",array($seccion,$item));
    return $id;
  }

  public function updateItem($id,$idseccion,$item) {
    $cantidad = DB::update("update items set idseccion=?,item=? where iditem=?",
      array($idseccion,$item,$id));
    return $cantidad;
  }
  
  public function deleteItem($id) {
    $id = DB::delete("delete from items where idItem=?",array($id));
    return $id;
  }
}
?>