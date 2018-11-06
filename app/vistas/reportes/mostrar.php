<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tr>
        <th style="width: 50px">#</th>
        <th style="width: 100px">Fecha</th>
        <th style="width: 100px">Lts Carga</th>
        <th style="width: 100px">Odómetro/Reloj</th>
        <th style="width: 100px">Kms/Hrs x Día</th>
        <th style="width: 100px">Kms/Hrs x Lt</th>
      </tr>
      <tr>
        <td></td><td><span class='badge bg-blue'>INICIALES</span></td><td></td><td><?php echo $inicial; ?></td>
      </tr>
      <?php 
      $i=1;
      while ($registro = $reporte->fetch()) {
        $pordia=$inicial;
        $pordia=$registro['kmshrs']-$pordia;
        $porlt=$pordia/$registro['litros'];

        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".$registro['fecha']."</td>";
        echo "<td>".$registro['litros']."</td>";
        echo "<td>".$registro['kmshrs']."</td>";
        echo "<td>$pordia</td>";
        echo "<td>$porlt</td>";
        echo "</tr>";

        $inicial=$registro['kmshrs'];
        $i++;
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->