<?php 
require_once "modelos/DB.php";

class VehiculosModelo {
  public function getVehiculos() {
    $consulta = DB::select("select * from vehiculos order by descripcion",null);
    return $consulta;
  }

  public function selectVehiculo($id) {
    $sql   = "select * from vehiculos";
    $where = "idVehiculo=?"; 
    $bind  = array($id);
    $consulta = DB::selectWhere($sql,$where,$bind);
    return $consulta->fetch();
  }
  
  public function insertVehiculo($codigo,$descripcion,$iniciales) {
    $id = DB::insert("insert into vehiculos (idMaquina,descripcion,iniciales) values (?,?,?)",array($codigo,$descripcion,$iniciales));
    return $id;
  }

  public function updateVehiculo($id,$idmaquina,$descripcion,$iniciales) {
    $cantidad = DB::update("update vehiculos set idmaquina=?,descripcion=?,iniciales=? where idvehiculo=?",
      array($idmaquina,$descripcion,$iniciales,$id));
    return $cantidad;
  }
    
  public function deleteVehiculo($id) {
    $id = DB::delete("delete from vehiculos where idVehiculo=?",array($id));
    return $id;
  }
}
?>