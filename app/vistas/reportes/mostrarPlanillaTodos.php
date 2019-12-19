<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tr>
        <th style="width: 50px">#</th>
        <th style="width: 100px">Vehículo</th>
        <th style="width: 100px">Litros Cargados</th>
      </tr>
      <?php 
      $i=1;
      $total=0;
      while ($registro = $reporte->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".$registro['descripcion']."</td>";
        echo "<td>".$registro['cantidad']."</td>";

        $i++;
        $total += $registro['cantidad'];
      }
      ?>
      <tr>
        <td></td><td><span class='badge bg-blue'>TOTAL</span></td><td><strong><?php echo number_format($total,2); ?></strong></td>
      </tr>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
