<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="">#</th>
        <th style="">Mes</th>
        <th style="">Año</th>
        <th style="">Litros</th>
        <th style="">Costo</th>
      </tr>
      
      <?php
      $total_litros = 0;
      $total_precio = 0;
      $i=1;
      while ($registro = $reporte->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".$meses[$registro['mes']-1][1]."</td>";
        echo "<td>".$registro['anio']."</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>$ ".number_format($registro['precio'],2)."</td>";
        echo "</tr>";
        
        $i++;
        $total_litros += $registro['litros'];
        $total_precio += $registro['precio'];
      }
      ?>
      <tr>
        <th></th>
        <th>TOTALES:</th>
        <th></th>
        <th><?php echo number_format($total_litros,2); ?></th>
        <th>$ <?php echo number_format($total_precio,2); ?></th>
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
        <h3 class="box-title">Litros Cargados</h3>

        <!--div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div-->
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="litros-cargados" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-6">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Costos Afrontados</h3>

        <!--div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div-->
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="costos-afrontados" style="height: 300px;"></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>