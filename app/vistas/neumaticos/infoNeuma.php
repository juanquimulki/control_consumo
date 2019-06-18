<table width="50%">
  <tr><td><b>Código:</b></td><td><?php echo $neumatico['codigo']; ?></td></tr>
  <tr><td><b>Marca:</b></td><td><?php echo $neumatico['marca']; ?></td></tr>
  <tr><td><b>Modelo:</b></td><td><?php echo $neumatico['modelo']; ?></td></tr>
  <tr><td><b>Medida:</b></td><td><?php echo $neumatico['medida']; ?></td></tr>
</table>

<br><br>
<div style="max-height:250px; overflow-y:scroll;">
<table class="table table-bordered">
  <thead>
    <th>Fecha</th><th>Operación</th><th>Kilómetros</th><th>Vehículo</th><th>Posición</th><th>Observaciones</th>
  </thead>
  <tbody>
    <?php
    while ($registro=$historial->fetch()) {
      echo "<tr>
            <td>".date("d/m/Y",strtotime($registro['fecha']))."</td>
            <td>".$registro['operacion']."</td>
            <td>".$registro['kilometros']."</td>
            <td>".$registro['vehiculo']."</td>
            <td>".$registro['posicion']."</td>
            <td>".$registro['observaciones']."</td>
            <tr>";
    }
    ?>
  </tbody>
</table>
</div>