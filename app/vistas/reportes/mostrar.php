<div class="box">
  <div class="box-header">
    <h3 class="box-title">Registros consultados...</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tr>
        <th style="width: 50px">#</th>
        <th style="width: 100px">Tarea</th>
        <th style="width: 100px">Litros</th>
        <th style="width: 150px">Odómetro/Reloj</th>
        <th>Kms/Hrs x Trabajo</th>
        <th>Totales</th>
      </tr>
      <tr>
        <td></td><td><span class='badge bg-blue'>Iniciales</span></td><td></td><td><?php echo $inicial; ?></td>
      </tr>
      <?php 
      $i=1;
      while ($registro = $reporte->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        switch ($registro['tipo']) {
          case 1:
            echo "<td><span class='badge bg-green'>Carga</span></td>";
            echo "<td>".$registro['valor']."</td>";
            echo "<td></td>";
            break;
          case 2:
            echo "<td><span class='badge bg-red'>Trabajo</span></td>";
            echo "<td></td>";
            echo "<td>".$registro['valor']."</td>";
            break;
        }
        
        echo "</tr>";
        $i++;
      }
      ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->