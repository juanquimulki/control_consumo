<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Control de Checklists
    <small>Visualización de novedades del período</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de datos...</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
          </div>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="idvehiculo" class="col-sm-2 control-label">Vehículo</label>
                <div class="col-sm-10">
                  <select class="form-control" id="idvehiculo">
                    <option value='0'>Seleccione...</option>
                    <?php
                    while ($registro=$vehiculos->fetch()) {
                      echo "<option value='".$registro['idVehiculo']."'>".utf8_encode($registro['descripcion'])."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Período</label>
                <div class="col-sm-5">
                  <select class="form-control" id="mes_desde">
                    <!--option value='0'>Seleccione...</option-->
                    <?php
                    foreach ($meses as $m) {
                      echo "<option value='".$m[0]."'>".$m[1]."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm-5">
                  <select class="form-control" id="anio_desde">
                    <!--option value='0'>Seleccione...</option-->
                    <?php
                    foreach ($anios as $a) {
                      echo "<option value='$a'>$a</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
          </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default" onclick="cancelarChecklist()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="mostrarChecklist()">Mostrar</button>
        </div>
        <!--div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div-->
      </div>

      <div id="alerta">
      </div>
      
    </div>
  </div>

<div id="mostrar">
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalles de la Novedad...</h4>
      </div>
      <div class="modal-body">
        <span id="detalles"><!--p>¿Confirma que desea eliminar el registro?</p--></span>
        <input id="iddetalle" type="hidden" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" onclick="solucionar();" data-dismiss="modal">Solucionado!:</button>
        <input type="text" id="resultados" style="margin-left:10px;" size="30" placeholder="Resultados..." class="pull-left" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</section>

