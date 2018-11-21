<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Registros guardados...</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        
        <?php
        $nombre      = "tabla_registros";
        $campos      = array("fecha","descripcion","kmshrs","abreviatura","observaciones");
        $id          = "idTrabajo";
        $encabezados = array("Fecha","Vehiculo","Kms/Hrs","Operario","Detalles");
        $registros   = $trabajos;
        include "vistas/tabla_registros.php";
        ?>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>