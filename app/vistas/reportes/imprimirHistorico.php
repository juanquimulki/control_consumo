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
  HISTÓRICO DE CONSUMO
</div>

<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Desde:</b></td><td><?php echo date("d/m/Y",strtotime($desde)); ?></td></tr>
  <tr><td><b>Hasta:</b></td><td><?php echo date("d/m/Y",strtotime($hasta)); ?></td></tr>
</table>
<br><br><br>

  <table style="width:100%;" border=1>
    <tr>
      <th style="">#</th>
      <th style="">Mes</th>
      <th style="">Año</th>
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
      echo "<td>".$meses[$registro['mes']-1][1]."</td>";
      echo "<td>".$registro['anio']."</td>";
      echo "<td>".$registro['litros']."</td>";
      echo "<td>$ ".number_format($registro['precio'],2)."</td>";
      echo "</tr>";
      
      $i++;
      $total_litros += $registro['litros'];
      $total_precio += $registro['precio'];
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
</body>
