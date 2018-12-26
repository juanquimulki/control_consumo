<?php
echo "<table>";
echo "<tr><td width='150px;'>Fecha:</td><td>".$registro['fecha']."</td></tr>"; 
echo "<tr height='10px;'></tr>";
echo "<tr><td>Vehículo:</td><td>".utf8_encode($registro['descripcion'])."</td></tr>";
echo "<tr><td>Operario:</td><td>".utf8_encode($registro['nombre'])."</td></tr>";
echo "<tr height='10px;'></tr>";
echo "<tr><td>Sección:</td><td>".utf8_encode($registro['seccion'])."</td></tr>";
echo "<tr><td>Item:</td><td>".utf8_encode($registro['item'])."</td></tr>";
echo "<tr><td>Detalles:</td><td>".utf8_encode($registro['detalles'])."</td></tr>";
echo "<tr height='10px;'></tr>";
echo "<tr><td>SOLUCIONADO:</td><td>".$registro['solucionado']."</td></tr> ";
echo "<tr><td></td><td>".utf8_encode($registro['resultados'])."</td></tr> ";
echo "</table>";
?>