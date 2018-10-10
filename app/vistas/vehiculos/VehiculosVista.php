<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vehículos
    <small>Archivo de vehículos</small>
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
                <label for="maquina" class="col-sm-2 control-label">Máquina</label>
                <div class="col-sm-10">
                  <select class="form-control" id="maquina">
                    <option value='0'>Seleccione...</option>
                    <?php
                    while ($registro=$maquinas->fetch()) {
                      echo "<option value='".$registro['idMaquina']."'>".utf8_encode($registro['maquina'])." (".utf8_encode($registro['zona']).")</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="codigo" class="col-sm-2 control-label">Código</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id" placeholder="" style="width:100px;" value="0" disabled />
                </div>
              </div>
              <div class="form-group">
                <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="descripcion" placeholder="Descripción..." />
                </div>
              </div>
              <div class="form-group">
                <label for="iniciales" class="col-sm-2 control-label">Kms/Hrs Iniciales</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="iniciales" placeholder="Kms/Hrs..." style="width:100px;" />
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

      <div id="alerta">
      </div>
      
    </div>
  </div>

<div id="mostrar">
</div>
</section>
