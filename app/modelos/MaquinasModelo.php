<?php 
include "modelos/DBmant.php";

class MaquinasModelo {
  public function getMaquinas() {
    $sql = "select idMaquina,zona,maquina from maquinas 
      inner join zonas on maquinas.idZona=zonas.idZona
      order by maquina";
    $consulta = DBmant::select($sql,null);
    return $consulta;
  }
}
?>