<table id="<?php echo $nombre; ?>" class="table table-bordered table-hover">
  <thead>
  <tr>
    <?php
    foreach ($encabezados as $e) {
      echo "<th>".utf8_encode($e)."</th>";
    }
    ?>
  </tr>
  </thead>
  <tbody>
    <?php
    while ($r = $registros->fetch()) {
      echo "<tr>";
      foreach ($campos as $c) {
        if ($c=="fecha")
          echo "<td>".date("d/m/Y",strtotime($r[$c]))."</td>";
        else
          echo "<td>".utf8_encode($r[$c])."</td>";
      }
      echo "</tr>";
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