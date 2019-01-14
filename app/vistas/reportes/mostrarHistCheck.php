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
        <th style="">Vehículo</th>
        <th style="">Sección</th>
        <th style="">Item</th>
        <th style="">Detalles</th>
        <th style="">Solucionado</th>
        <th style="">Resultados</th>
      </tr>

      <?php
      $i=1;
      while ($registro = $reporte->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>";
        echo "<td>".utf8_encode($registro['descripcion'])."</td>";
        echo "<td>".utf8_encode($registro['seccion'])."</td>";
        echo "<td>".utf8_encode($registro['item'])."</td>";
        echo "<td>".utf8_encode($registro['detalles'])."</td>";
        echo "<td>";
        echo ($registro['solucionado']?date("d/m/Y",strtotime($registro['solucionado'])):"");
        echo "</td>";
        echo "<td>".utf8_encode($registro['resultados'])."</td>";
        echo "</tr>";

        $i++;
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
