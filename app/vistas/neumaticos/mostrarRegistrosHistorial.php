<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Registros guardados... <?php echo ($neumatico['codigo']?"(Cubierta: <b>".$neumatico['codigo']."</b>)":""); ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php
        $nombre      = "tabla_registros";
        $campos      = array("fecha","operacion","kilometros","vehiculo","posicion","observaciones");
        $id          = "idHistorial";
        $encabezados = array("Fecha","Operacion","Kms/Hrs","Vehiculo","Posicion","Observaciones");
        $registros   = $historial;
        $maestro     = 0;
        //include "vistas/tabla_registros.php";
        ?>

        <table id="<?php echo $nombre; ?>" class="table table-bordered table-hover">
          <thead>
          <tr>
            <?php
            foreach ($encabezados as $e) {
              echo "<th>".utf8_encode($e)."</th>";
            }
            echo "<th></th>";
            ?>
          </tr>
          </thead>
          <tbody>
            <?php
            while ($r = $registros->fetch()) {
              echo "<tr>";
              foreach ($campos as $c) {
                if ($c=="fecha")
                  echo "<td>".date("d/m/Y",strtotime($r[$c]))."</td>";
                else
                  if ($c=="operacion") {
                    echo "<td>";
                    echo $r[$c];
                    echo ($r['destino']?"<br>".$destinos[$r['destino']-1]["destino"]:"");
                    echo "</td>";
                  }
                  else
                    echo "<td>".utf8_encode($r[$c])."</td>";
              }
              //echo "<td><a href='http://".$GLOBALS['SERVER_NAME']."/control_consumo/index.php?c=operarios&a=borrar&id=".$r[$id]."'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a></td>";
              $id_eliminar = $r[$id];
              if ($_SESSION['perfil']==1) {
                echo "<td>";
                echo "<a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:modalEliminar($id_eliminar)'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a>";
                if ($maestro) {
                  echo "<a href='#arriba' style='cursor:pointer'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/edit.png' onclick='javascript:modificar($id_eliminar);' /></a>";
                }
                echo "</td>";
              }
              else {
                echo "<td></td>";
              }
              echo "</tr>";
            }
            ?>
          </tbody>
          <!-- <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
          </tfoot> -->
        </table>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<button style="margin-right:10px;" class="btn btn-info pull-right" onclick="imprimirHistorial()">Imprimir</button>
