<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Operarios
    <small>Archivo de operarios</small>
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
                <label for="id" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id" placeholder="" style="width:100px;" value="#" disabled />
                </div>
              </div>
              <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre..." maxlength="50">
                </div>
              </div>
              <div class="form-group">
                <label for="abreviatura" class="col-sm-2 control-label">Abreviatura</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="abreviatura" placeholder="Abreviatura..." maxlength="20">
                </div>
              </div>
          </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default" onclick="cancelar()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="guardar()">Guardar</button>
        </div>
        <!--div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div-->
      </div>
    </div>
  </div>

<div id="mostrar">
</div>
</section>
