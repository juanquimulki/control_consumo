<!DOCTYPE html>

<head>
<title>Control de Consumo | Cerámica Santiago</title>
<meta charset="UTF-8">
<style>
  body {
    font-family: arial;
  }
  table td {
    padding: 5px;
  }
  .titulo {
    width: 100%;
    border: 2px solid black;
    text-align: center;
    font-weight: bold;
    padding:10px;
    margin-bottom: 50px;
    font-size: 16pt;
  }
  .firma {
    border-top: 1px dotted black;
    width: 250px;
    text-align: center;
    float: right;
    margin-right: 100px;
  }
</style>
</head>

<body>
<div class="titulo">
  HISTORIAL DE LA CUBIERTA
</div>

<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Neumático:</b></td><td><?php echo $_GET['n']; ?></td></tr>
</table>
<br><br><br>

<?php
$nombre      = "tabla_registros";
$campos      = array("fecha","operacion","kilometros","vehiculo","posicion","observaciones");
$id          = "idHistorial";
$encabezados = array("Fecha","Operacion","Kms/Hrs","Vehiculo","Posicion","Observaciones");
$registros   = $historial;
$maestro     = 0;
//include "vistas/tabla_registros.php";
?>

<table style="width:100%;" border=1>
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
          if ($c=="operacion") {
            echo "<td>";
            echo $r[$c];
            echo ($r['destino']?"<br>".$destinos[$r['destino']-1]["destino"]:"");
            echo "</td>";
          }
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

</body>
