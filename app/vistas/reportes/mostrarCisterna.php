<div class="box">
  <div class="box-header">
    <h3 class="box-title">Ingresos</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="">#</th>
        <th style="">Fecha</th>
        <th style="">Tipo</th>
        <th style="">Litros</th>
        <th style="">Observaciones</th>
      </tr>

      <?php
      $i=1;
      $total_ingresos = 0;
      while ($registro = $ingresos->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>";
        echo "<td>INGRESO</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>".utf8_encode($registro['observaciones'])."</td>";
        echo "</tr>";
        $i++;
        $total_ingresos += $registro['litros'];
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Egresos</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="">#</th>
        <th style="">Fecha</th>
        <th style="">Tipo</th>
        <th style="">Litros</th>
        <th style="">Observaciones</th>
      </tr>

      <?php
      $i=1;
      $total_egresos = 0;
      while ($registro = $egresos->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>";
        echo "<td>".$registro['tipo']."</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>".utf8_encode($registro['observaciones'])."</td>";
        echo "</tr>";
        $i++;
        $total_egresos += $registro['litros'];
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Resumen</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="width:200px;">Stock anterior:</th><td><?php echo $anterior; ?></td>
      </tr>
      <tr>
        <th>Total Ingresos:</th><td><?php echo $total_ingresos; ?></td>
      </tr>
      <tr>
        <th>Total Egresos:</th><td><?php echo $total_egresos; ?></td>
      </tr>
      <tr>
        <th>Stock actual:</th><td><?php echo $anterior+$total_ingresos-$total_egresos; ?> litros</td>
      </tr>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
