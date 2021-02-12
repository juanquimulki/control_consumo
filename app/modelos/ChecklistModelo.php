<?php
require_once "modelos/DB.php";

class ChecklistModelo {
  public function getChecklists() {
    $sql = "select checklist.idChecklist,fecha,descripcion,abreviatura,seccion,item,detalles,kmshrs from checklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join operarios on checklist.idOperario=operarios.idOperario
              left outer join detalles on checklist.idChecklist=detalles.idChecklist
              left outer join items on detalles.idItem=items.idItem
              left outer join secciones on items.idSeccion=secciones.idSeccion
              order by fecha desc";
              //order by fecha,descripcion,detalles.idItem";
    $consulta = DB::select($sql,null);
    return $consulta;
  }

  public function getNovedad($iditem,$fecha,$idvehiculo) {
    $sql  = "select checklist.idChecklist,idDetalle,detalles.idItem,checklist.idVehiculo,fecha,solucionado from checklist
              inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
              inner join operarios on checklist.idOperario=operarios.idOperario
              left outer join detalles on checklist.idChecklist=detalles.idChecklist
              left outer join items on detalles.idItem=items.idItem
              where detalles.idItem=? and checklist.fecha=? and checklist.idVehiculo=?";
    $bind = array($iditem,$fecha,$idvehiculo);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function getDetalles($id) {
    $sql  = "select idDetalle,fecha,descripcion,nombre,item,seccion,detalles,solucionado,resultados,kmshrs from detalles
              inner join checklist on detalles.idChecklist=checklist.idChecklist
							inner join vehiculos on checklist.idVehiculo=vehiculos.idVehiculo
							inner join operarios on checklist.idOperario=operarios.idOperario
              inner join items on detalles.idItem=items.idItem
              inner join secciones on items.idSeccion=secciones.idSeccion
              where idDetalle=?";
    $bind = array($id);
    $consulta = DB::select($sql,$bind);
    return $consulta;
  }

  public function solucionarDetalles($id,$resultados) {
    $sql  = "update detalles set solucionado=now(),resultados=? where iddetalle=?";
    $bind = array($resultados,$id);
    $consulta = DB::exec($sql,$bind);
  }

  public function insertChecklist($fecha,$idvehiculo,$kmshrs,$idoperario) {
    $id = DB::insert("insert into checklist (fecha,idVehiculo,kmshrs,idOperario) values (?,?,?,?)",array($fecha,$idvehiculo,$kmshrs,$idoperario));
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
