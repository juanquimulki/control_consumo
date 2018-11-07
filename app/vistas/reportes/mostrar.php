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
      $primero=1;
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
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->