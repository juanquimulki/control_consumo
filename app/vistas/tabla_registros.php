<table id="<?php echo $nombre; ?>" class="table table-bordered table-hover">
  <thead>
  <tr>
    <?php
    foreach ($encabezados as $e) {
      echo "<th>".utf8_encode($e)."</th>";
    }
    echo "<th></th>";
    ?>
  </tr>
  </thead>
  <tbody>
    <?php
    while ($r = $registros->fetch()) {
      echo "<tr>";
      foreach ($campos as $c) {
        switch ($c) {
          case "fecha":
            echo "<td data-sort='".$r[$c]."'>".date("d/m/Y",strtotime($r[$c]))."</td>";
            break;
          case "perfil":
            switch ($r[$c]) {
              case "1":
                echo "<td>Administrador</td>";
                break;
              case "2":
                echo "<td>Carga</td>";
                break;
              case "3":
                echo "<td>Consulta</td>";
                break;
				    }
				  break;
			  default:
				  echo "<td>".utf8_encode($r[$c])."</td>";
		}
      }
      //echo "<td><a href='http://".$GLOBALS['SERVER_NAME']."/control_consumo/index.php?c=operarios&a=borrar&id=".$r[$id]."'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a></td>";
      $id_eliminar = $r[$id]; 
      if ($_SESSION['perfil']==1) {
        echo "<td>";
        echo "<a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:modalEliminar($id_eliminar)'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/delete.png' /></a>";
        if ($maestro) {
          echo "<a href='#arriba' style='cursor:pointer'><img src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/img/edit.png' onclick='javascript:modificar($id_eliminar);' /></a>";
        }
        echo "</td>";
      }
      else {
        echo "<td></td>";
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