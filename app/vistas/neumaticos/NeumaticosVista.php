<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Archivo de Cubiertas</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <?php
  if ($_SESSION['perfil']<=2) {
  ?>
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
            <?php //var_dump($_SESSION); ?>
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
                      <label for="nombre" class="col-sm-2 control-label">Código</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="codigo" placeholder="Código..." maxlength="20" style="width:150px;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nombre" class="col-sm-2 control-label">Marca</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="marca" placeholder="Marca..." maxlength="50">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nombre" class="col-sm-2 control-label">Modelo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="modelo" placeholder="Modelo..." maxlength="50">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nombre" class="col-sm-2 control-label">Medida</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="medida" placeholder="Medida..." maxlength="20" style="width:150px;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idvehiculo" class="col-sm-2 control-label">Estado</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="estado" style="width:150px;">
                          <option value='0'>Seleccione...</option>
                          <?php 
                          foreach ($estados as $est) {
                            echo "<option value='".$est['id']."'>".$est['estado']."</option>";
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
                      <label for="nombre" class="col-sm-2 control-label">Proveedor</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="proveedor" placeholder="Proveedor..." maxlength="50">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Fecha de Compra</label>
                        <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="fecha" placeholder="dd/mm/aaaa" />
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="litros" class="col-sm-2 control-label">Precio</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" placeholder="Precio..." style="width:100px;" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="precinto" class="col-sm-2 control-label">Kms/Hrs</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kilometros" placeholder="Kms/Hrs..." style="width:100px;" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
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
  <?php
  }
  ?>

<div id="mostrar">
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Registro...</h4>
      </div>
      <div class="modal-body">
        <!--p>¿Confirma que desea eliminar el registro?</p-->
        <p>Función aún no implementada</p-->
        <input id="id_eliminar" type="hidden" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</section>
