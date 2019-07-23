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
  CÁLCULO DE RODAJE
</div>

<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Neumático:</b></td><td><?php echo $_GET['n']; ?></td></tr>
</table>
<br><br><br>

  <table style="width:100%;" border=1>
    <tr>
      <th style="">Fecha</th>
      <th style="">Operación</th>
      <th style="">Kms/Hrs</th>
      <th style="">Parcial</th>
      <th style="">Total</th>
    </tr>
    <?php
    $total = 0;
    $boton = false;
    while ($registro =  $movimientos->fetch()) {
        echo "<tr>
                <td>".date("d/m/Y",strtotime($registro['fecha']))."</td>
                <td>".$registro['operacion']."</td>
                <td>".$registro['kilometros']."</td>";

        switch ($registro['idoperacion']) {
          case 1:
            $inicio = $registro['kilometros'];
            $parcial = $inicio;
            $total += $inicio;
            $boton = false;
            break;
          case 2:
            $colocado = $registro['kilometros'];
            $parcial = "";
            $boton = true;
            break;
          case 3:
            $quitado = $registro['kilometros'];
            $parcial = $quitado - $colocado;
            $total += $parcial;
            $boton = false;
            break;
        }

        echo "<td>$parcial</td>";
        echo "<td>$total</td>";
        echo "</tr>";
    }
    if ($actuales) {
      $parcial = $actuales - $colocado;
      $total += $parcial;
      echo "<tr style='font-style:italic;'><td>".date("d/m/Y")."</td><td>Estado Actual</td><td>".$actuales."</td><td>".$parcial."</td><td>".$total."</td></tr>";
    }
    if ($boton) {
      echo "<tr><td></td><td><button onclick='estadoActual();'>Estado Actual</button></td></tr>";
    }
    ?>
  </table>
</body>
