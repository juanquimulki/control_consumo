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
  PLANILLA MENSUAL
</div>

<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Vehiculo:</b></td><td><?php echo $vehiculo; ?></td></tr>
  <tr><td><b>Desde:</b></td><td><?php echo date("d/m/Y",strtotime($desde)); ?></td></tr>
  <tr><td><b>Hasta:</b></td><td><?php echo date("d/m/Y",strtotime($hasta)); ?></td></tr>
</table>
<br><br><br>

  <table style="width:100%;" border=1>
    <tr>
      <th style="">#</th>
      <th style="">Fecha</th>
      <th style="">Lts Carga</th>
      <th style="">Odómetro/Reloj</th>
      <th style="">Kms/Hrs x Día</th>
      <th style="">Kms/Hrs x Lt</th>
    </tr>
    <tr>
      <td></td><td><span class=''>INICIALES</span></td><td></td><td><?php echo $inicial; ?></td>
    </tr>
    <?php 
    $i=1;
    $primero=1;
    $total_lts=0;
    $total_kms=0;
    $total_porlt=0;
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
        echo "<td><span class=''>".number_format($porlt,2)."</span></td>";
        $primero=0;
      }
      else {
        if ($porlt<=$porltant)
          echo "<td><span class=''>".number_format($porlt,2)."</span></td>";
        else
          echo "<td><span class=''>".number_format($porlt,2)."</span></td>";
      }
      $porltant = $porlt;
      
      echo "</tr>";

      $inicial=$registro['kmshrs'];
      $i++;
      
      $total_lts += $registro['litros'];
      $total_kms += $pordia;
      $total_porlt += $porlt;
    }
    ?>
    <tr>
      <td></td><td><span class=''>TOTALES</span></td><td><strong><?php echo number_format($total_lts,2); ?></strong></td><td></td><td><strong><?php echo number_format($total_kms,2); ?></strong></td><td><span class='badge bg-blue'>Promedio = <?php echo (($i-1)>0?number_format($total_porlt/($i-1),2):"---"); ?></span></td>
    </tr>
  </table>
</body>
