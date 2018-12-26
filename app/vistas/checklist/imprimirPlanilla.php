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
  PLANILLA DE NOVEDADES DEL VEHÍCULO
</div>  
  
<table style="width:100%;" border=1>
  <tr><td style="width:250px;"><b>Fecha:</b></td><td></td></tr>
  <tr><td><b>Vehículo:</b></td><td></td><td style="width:250px;"><b>Kms. Actuales:</b></td><td></td></tr>
  <tr><td><b>Operario:</b></td><td></td><td><b>Zona de Trabajo:</b></td><td></td></tr>
</table>
<br><br><br>

<table style="width:100%;" border=1>
   <thead>
   <tr><th style="width:250px;">Sección/Item</th><th>Falla/Detalles</th></tr>
   </thead>
   <tbody>
   <?php
   $seccion = "";
   while ($registro = $items->fetch()) {
     if ($seccion!=$registro['seccion']) {
       echo "<tr><td><b>".utf8_encode($registro['seccion']).":</b></td></tr>";
       $seccion = $registro['seccion'];
     }
     echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($registro['item'])."</td>";
     echo "<td>";
     echo "<input type='checkbox' />";
     echo "</td>";
     echo "</tr>\n";
   }
   ?>
   </tbody>
</table>
<br><br><br><br><br><br><br>

<div class="firma">
  Firma y Aclaración
</div>

</body>

<script>
  window.print();
</script>