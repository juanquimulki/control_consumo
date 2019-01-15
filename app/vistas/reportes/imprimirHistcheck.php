<title>Control de Consumo | Servicios Industriales</title>

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

<div class="titulo">
  HISTÓRICO DE CHECKLISTS
</div>

<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Desde:</b></td><td><?php echo date("d/m/Y",strtotime($primero)); ?></td></tr>
  <tr><td><b>Hasta:</b></td><td><?php echo date("d/m/Y",strtotime($ultimo)); ?></td></tr>
</table>
<br><br><br>

    <table style="width:100%;" border=1>
      <tr>
        <th style="">#</th>
        <th style="">Fecha</th>
        <th style="">Vehículo</th>
        <th style="">Sección</th>
        <th style="">Item</th>
        <th style="">Detalles</th>
        <th style="">Solucionado</th>
        <th style="">Resultados</th>
      </tr>

      <?php
      $i=1;
      while ($registro = $reporte->fetch()) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>";
        echo "<td>".utf8_encode($registro['descripcion'])."</td>";
        echo "<td>".utf8_encode($registro['seccion'])."</td>";
        echo "<td>".utf8_encode($registro['item'])."</td>";
        echo "<td>".utf8_encode($registro['detalles'])."</td>";
        echo "<td>";
        echo ($registro['solucionado']?date("d/m/Y",strtotime($registro['solucionado'])):"");
        echo "</td>";
        echo "<td>".utf8_encode($registro['resultados'])."</td>";
        echo "</tr>";

        $i++;
      }
      ?>
    </table>
