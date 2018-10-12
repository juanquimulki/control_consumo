<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cargas de combustible
    <small>Registro de la expedición</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
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
            <div class="row">
              <div class="col-md-6">
                <form class="form-horizontal">
                    <div class="form-group">
                      <label for="id" class="col-sm-2 control-label">ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" placeholder="" style="width:100px;" value="#" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Fecha:</label>
                        <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="fecha" placeholder="dd/mm/aaaa">
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>
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
                  </form>
                </div>
                <div class="col-md-6">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label for="litros" class="col-sm-2 control-label">Litros</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="litros" placeholder="Litros..." style="width:100px;" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="precinto" class="col-sm-2 control-label">Precinto</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="precinto" placeholder="Precinto..." style="width:100px;" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idoperario" class="col-sm-2 control-label">Operario</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="idoperario">
                          <option value='0'>Seleccione...</option>
                          <?php
                          while ($registro=$operarios->fetch()) {
                            echo "<option value='".$registro['idOperario']."'>".utf8_encode($registro['nombre'])." (".utf8_encode($registro['abreviatura']).")</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="observaciones" class="col-sm-2 control-label">Detalles</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="observaciones" placeholder="Observaciones..." /></textarea>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
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
