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
        $campos      = array("idCisterna","fecha","tipo","litros","observaciones");
        $id          = "idCisterna";
        $encabezados = array("ID","Fecha","Tipo","Litros","Observaciones");
        $registros   = $cisterna;
        include "vistas/tabla_registros.php";
        ?>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
