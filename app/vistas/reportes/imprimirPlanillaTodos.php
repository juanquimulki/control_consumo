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
  PLANILLA MENSUAL (TODOS LOS VEHÍCULOS)
</div>

<table style="width:100%;" border=1>
  <tr><td><b>Desde:</b></td><td><?php echo date("d/m/Y",strtotime($desde)); ?></td></tr>
  <tr><td><b>Hasta:</b></td><td><?php echo date("d/m/Y",strtotime($hasta)); ?></td></tr>
</table>
<br><br><br>

  <table style="width:100%;" border=1>
    <tr>
      <th style="">#</th>
      <th style="">Vehículo</th>
      <th style="">Litros Cargados</th>
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
      <td></td><td><span class=''>TOTAL</span></td><td><strong><?php echo number_format($total,2); ?></strong></td>
    </tr>
  </table>
</body>
