<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="">#</th>
        <th style="">Fecha</th>
        <th style="">Particular</th>
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
        echo "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>";
        echo "<td>".utf8_encode($registro['nombre'])."</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>$ ".number_format($registro['litros']*$registro['precio'],2)."</td>";
        echo "</tr>";

        $i++;
        $total_litros += $registro['litros'];
        $total_precio += $registro['litros']*$registro['precio'];
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
