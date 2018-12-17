<?php 
require_once "modelos/DB.php";

class ItemsModelo {
  public function getSecciones() {
    $consulta = DB::select("select * from secciones order by idSeccion",null);
    return $consulta;
  }
  
  public function getItems() {
    $sql = "select * from items 
              inner join secciones on items.idseccion=secciones.idseccion
              order by idseccion,iditem";
    $consulta = DB::select($sql,null);
    return $consulta;
  }  
}
?>