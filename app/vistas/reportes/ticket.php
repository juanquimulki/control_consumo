<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
</head>
<body>

<div class="titulo">
  COMPROBANTE DE RESOLUCIÓN DE INCONVENIENTES MECÁNICOS
</div>  
  
<?php
echo "<table>";
echo "<tr><td width='150px;'><b>Fecha:</b></td><td>".$registro['fecha']."</td></tr>"; 
echo "<tr height='10px;'></tr>";
echo "<tr><td><b>Vehículo:</b></td><td>".utf8_encode($registro['descripcion'])."</td></tr>";
echo "<tr><td><b>Operario:</b></td><td>".utf8_encode($registro['nombre'])."</td></tr>";
echo "<tr height='10px;'></tr>";
echo "<tr><td><b>Sección:</b></td><td>".utf8_encode($registro['seccion'])."</td></tr>";
echo "<tr><td><b>Item:</b></td><td>".utf8_encode($registro['item'])."</td></tr>";
echo "<tr><td><b>Detalles:</b></td><td>".utf8_encode($registro['detalles'])."</td></tr>";
echo "<tr height='10px;'></tr>";
echo "<tr><td><b>SOLUCIONADO:</b></td><td>".$registro['solucionado']."</td></tr> ";
echo "<tr><td></td><td>".utf8_encode($registro['resultados'])."</td></tr> ";
echo "</table>";
?>

<div class="firma">
  Firma y Aclaración
</div>

</body>

<script>
  window.print();
</script>