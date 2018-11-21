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
        $campos      = array("idPrecio","fecha","precio");
        $id          = "idPrecio";
        $encabezados = array("ID","Fecha","Precio");
        $registros   = $precios;
        include "vistas/tabla_registros.php";
        ?>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>