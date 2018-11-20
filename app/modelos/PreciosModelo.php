<?php 
require_once "modelos/DB.php";

class PreciosModelo {
  public function getPrecios() {
    $consulta = DB::select("select * from precios order by fecha",null);
    return $consulta;
  }

  public function getUltPrecio() {
    $consulta = DB::select("select * from precios order by fecha desc limit 1",null);
    $registro = $consulta->fetch();
    return $registro['precio'];
  }

  public function insertPrecio($fecha,$precio) {
    $id = DB::insert("insert into precios (fecha,precio) values (?,?)",array($fecha,$precio));
    return $id;
  }
}
?>