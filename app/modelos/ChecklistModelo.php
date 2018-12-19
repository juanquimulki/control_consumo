<?php 
require_once "modelos/DB.php";

class ChecklistModelo {
  public function getChecklists() {
    $sql = "select checklist.idChecklist,fecha,descripcion,abreviatura,item,detalles from checklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join operarios on checklist.idOperario=operarios.idOperario
              left outer join detalles on checklist.idChecklist=detalles.idChecklist
              left outer join items on detalles.idItem=items.idItem
              order by fecha,descripcion,detalles.idItem";
    $consulta = DB::select($sql,null);
    return $consulta;
  }
  
  public function getNovedad($iditem,$fecha) {
    $sql  = "select checklist.idChecklist,idDetalle,detalles.idItem,checklist.idVehiculo,fecha from checklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join operarios on checklist.idOperario=operarios.idOperario
              left outer join detalles on checklist.idChecklist=detalles.idChecklist
              left outer join items on detalles.idItem=items.idItem
              where detalles.idItem=? and checklist.fecha=?";
    $bind = array($iditem,$fecha);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function insertChecklist($fecha,$idvehiculo,$idoperario) {
    $id = DB::insert("insert into checklist (fecha,idVehiculo,idOperario) values (?,?,?)",array($fecha,$idvehiculo,$idoperario));
    return $id;
  }

  public function insertDetalles($idchecklist,$iditem,$detalles) {
    $id = DB::insert("insert into detalles (idchecklist,iditem,detalles) values (?,?,?)",array($idchecklist,$iditem,$detalles));
    return $id;
  }

  public function deleteChecklist($ideliminar) {
    $id = DB::delete("delete from checklist where idChecklist=?",array($ideliminar));
    DB::delete("delete from detalles where idChecklist=?",array($ideliminar));
    return $id;
  }
}
?>