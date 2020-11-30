<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <?php //echo "$_POST[vehiculo] $_POST[mesdesde] $_POST[meshasta] $_POST[aniodesde] $_POST[aniohasta]"; ?>
    <table class="table table-condensed">
      <tr>
        <th style="width: 50px">#</th>
        <th style="width: 100px">Fecha</th>
        <th style="width: 100px">Lts Carga</th>
        <th style="width: 100px">Odómetro/Reloj</th>
        <th style="width: 100px">Kms/Hrs x Día</th>
        <th style="width: 100px">Lt x Kms/Hrs</th>
      </tr>
      <tr>
        <td></td><td><span class='badge bg-blue'>INICIALES</span></td><td></td><td><?php echo $inicial; ?></td>
      </tr>
      <?php 
      $i=1;
      $primero=1;
      $total_lts=0;
      $total_kms=0;
      $total_porlt=0;
      while ($registro = $reporte->fetch()) {
        $pordia=$inicial;
        $pordia=$registro['kmshrs']-$pordia;
        $porlt=$registro['litros']/$pordia;

        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".$registro['fecha']."</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>".$registro['kmshrs']."</td>";
        echo "<td>$pordia</td>";

        if ($primero) {
          echo "<td><span class='badge bg-blue'>".number_format($porlt,2)."</span></td>";
          $primero=0;
        }
        else {
          if ($porlt<=$porltant)
            echo "<td><span class='badge bg-green'>".number_format($porlt,2)."</span></td>";
          else
            echo "<td><span class='badge bg-red'>".number_format($porlt,2)."</span></td>";
        }
        $porltant = $porlt;
        
        echo "</tr>";

        $inicial=$registro['kmshrs'];
        $i++;
        
        $total_lts += $registro['litros'];
        $total_kms += $pordia;
        $total_porlt += $porlt;
      }
      ?>
      <tr>
        <!--td></td><td><span class='badge bg-blue'>TOTALES</span></td><td><strong><?php echo number_format($total_lts,2); ?></strong></td><td></td><td><strong><?php echo number_format($total_kms,2); ?></strong></td><td><span class='badge bg-blue'>Promedio = <?php echo (($i-1)>0?number_format($total_porlt/($i-1),2):"---"); ?></span></td-->
        <td></td><td><span class='badge bg-blue'>TOTALES</span></td><td><strong><?php echo number_format($total_lts,2); ?></strong></td><td></td><td><strong><?php echo number_format($total_kms,2); ?></strong></td><td><span class='badge bg-blue'>Promedio = <?php echo (($i-1)>0?number_format($total_lts/$total_kms,2):"---"); ?></span></td>
      </tr>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="row">
  <div class="col-md-6">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Carga de Trabajo</h3>

        <!--div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div-->
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="carga-trabajo" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-6">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Rendimiento del Combustible</h3>

        <!--div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div-->
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="rendimiento-combustible" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>