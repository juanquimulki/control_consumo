<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cambiar mi clave
    <small></small>
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
                <label for="actual" class="col-sm-4 control-label">Clave Actual</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="actual" placeholder="Clave actual..." maxlength="10" style="width:200px;">
                </div>
              </div>
              <div class="form-group">
                <label for="nueva" class="col-sm-4 control-label">Nueva Clave</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="nueva" placeholder="Nueva clave..." maxlength="10" style="width:200px;">
                </div>
              </div>
              <div class="form-group">
                <label for="confirma" class="col-sm-4 control-label">Confirmar Clave</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="confirma" placeholder="Confirmar nueva clave..." maxlength="10" style="width:200px;">
                </div>
              </div>
          </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default" onclick="cancelarClave()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="guardarClave()">Guardar</button>
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

</section>
