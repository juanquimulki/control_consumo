<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Registros guardados...</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php
        $nombre      = "tabla_registros";
        $campos      = array("fecha","descripcion","kmshrs","abreviatura");
        $id          = "idChecklist";
        $encabezados = array("Fecha","Vehiculo","Kms/Hrs","Operario","Detalles");
        $registros   = $checklists;

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
            $id = 0;
            $primero = true;
            while ($r = $registros->fetch()) {
              if ($id==$r['idChecklist']) {
                if ($r['item']) echo utf8_encode($r['item'])." (".utf8_encode($r['seccion'])."): ".utf8_encode($r['detalles'])." <br> ";
              }
              else {
                $id=$r['idChecklist'];

                if (!$primero) {
                  echo "</td>";
                  if ($_SESSION['perfil']==1) {
                    echo "<td><a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:modalEliminar($id_eliminar)'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a></td>";
                  }
                  else {
                    echo "<td></td>";
                  }
                  echo "</tr>";
                }

                $primero = false;
                echo "<tr>";
                foreach ($campos as $c) {
                  if ($c=="fecha")
                    echo "<td>".date("d/m/Y",strtotime($r[$c]))."</td>";
                  else
                    echo "<td>".utf8_encode($r[$c])."</td>";
                }
                echo "<td>";
                if ($r['item']) echo utf8_encode($r['item'])." (".utf8_encode($r['seccion'])."): ".utf8_encode($r['detalles'])." <br> ";
                $id_eliminar = $r['idChecklist'];
              }


              /*$id_eliminar = $r[$id];
              if ($_SESSION['perfil']==1) {
                echo "<td><a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:modalEliminar($id_eliminar)'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a></td>";
              }
              else {
                echo "<td></td>";
              }*/
              /*foreach ($campos as $c) {
                if ($c=="fecha")
                  echo "<td>".date("d/m/Y",strtotime($r[$c]))."</td>";
                else
                  echo "<td>".utf8_encode($r[$c])."</td>";
              }*/
            }
            echo "</td>";
            $id_eliminar = $id;
            if ($_SESSION['perfil']==1) {
              echo "<td><a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:modalEliminar($id_eliminar)'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a></td>";
            }
            else {
              echo "<td></td>";
            }
            echo "</tr>";
            ?>
          </tbody>
        </table>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
