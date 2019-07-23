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
  STOCK DE CUBIERTAS
</div>

<br>

  <table style="width:100%;" border=1>
    <tr>
      <th style="">#</th>
      <th style="">Código</th>
      <th style="">Marca</th>
      <th style="">Modelo</th>
      <th style="">Medida</th>
      <th style="">Últ. Operación</th>
      <th style="">Vehículo</th>
      <th style="">Posición</th>
    </tr>
    <?php
    $i=0;
    while ($registro=$neumaticos->fetch()) {
      $i++;
      echo "<tr>
            <td><b>$i</b></td>
            <td>".$registro['codigo']."</td>
            <td>".$registro['marca']."</td>
            <td>".$registro['modelo']."</td>
            <td>".$registro['medida']."</td>
            <td><b>".strtoupper($registro['operacion'])."</b> ";
      echo ($registro['destino']?"<br>".$destinos[$registro['destino']-1]["destino"]:"");
      echo "</td>
            <td>".$registro['vehiculo']."</td>
            <td>".($registro['posicion']?$registro['posicion']:"")."</td>
            </tr>";
    }
    ?>
  </table>
</body>
