<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rodaje de la Cubierta...</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <table id="<?php ?>" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Fecha</th>
            <th>Operación</th>
            <th>Kms/Hrs</th>
            <th>Parcial</th>
            <th>Total</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            $boton = false;
            while ($registro =  $movimientos->fetch()) {
                echo "<tr>
                        <td>".date("d/m/Y",strtotime($registro['fecha']))."</td>
                        <td>".$registro['operacion']."</td>
                        <td>".$registro['kilometros']."</td>";
                        
                switch ($registro['idoperacion']) {
                  case 1:
                    $inicio = $registro['kilometros'];
                    $parcial = $inicio;
                    $total += $inicio;
                    $boton = false;
                    break;
                  case 2:
                    $colocado = $registro['kilometros'];
                    $parcial = "";
                    $boton = true;
                    break;
                  case 3:
                    $quitado = $registro['kilometros'];
                    $parcial = $quitado - $colocado;
                    $total += $parcial;
                    $boton = false;
                    break;
                }        
                        
                echo "<td>$parcial</td>";        
                echo "<td>$total</td>";
                echo "</tr>";
            }
            if ($actuales) {
              $parcial = $actuales - $colocado;
              $total += $parcial;
              echo "<tr style='font-style:italic;'><td>".date("d/m/Y")."</td><td>Estado Actual</td><td>".$actuales."</td><td>".$parcial."</td><td>".$total."</td></tr>";
            }
            if ($boton) {
              echo "<tr><td></td><td><button onclick='estadoActual();'>Estado Actual</button></td></tr>";
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
