<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Planilla Mensual (Todos los vehículos)
    <small>Reporte de movimientos por período de todos los vehículos</small>
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
                  <label for="fecha_desde" class="col-sm-2 control-label">Desde</label>
                  <div class="col-sm-10">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="fecha_desde" placeholder="dd/mm/aaaa">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
              <div class="form-group">
                  <label for="fecha_hasta" class="col-sm-2 control-label">Hasta:</label>
                  <div class="col-sm-10">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="fecha_hasta" placeholder="dd/mm/aaaa">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
          </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default" onclick="cancelarPlanillaTodos()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="mostrarPlanillaTodos()">Mostrar</button>
          <button style="margin-right:10px;" class="btn btn-info pull-right" onclick="imprimirPlanillaTodos()">Imprimir</button>
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

</section>
