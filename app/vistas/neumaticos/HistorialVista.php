<style>
  .rueda {
    background-color: gray;
    border:2px solid black;
    cursor: pointer;
  }
  .rueda:hover {
    background-color: black;
  }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Historial de las Cubiertas</small>
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
                      <label for="idneumatico" class="col-sm-2 control-label">Neumático</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-9">
                            <select class="form-control" id="idneumatico">
                              <option value='0'>Seleccione...</option>
                              <?php
                              while ($registro=$neumaticos->fetch()) {
                                echo "<option value='".$registro['idNeumatico']."'>(".$registro['codigo'].") ".utf8_encode($registro['marca'])." ".utf8_encode($registro['modelo'])."</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <button type="button" style="width:70px;" class="btn btn-block btn-default" onclick="javascript:mostrarHistorial();">Mostrar</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Fecha</label>
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
                      <label for="idoperacion" class="col-sm-2 control-label">Operación</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="idoperacion">
                          <option value='0'>Seleccione...</option>
                          <?php
                          while ($registro=$operaciones->fetch()) {
                            echo "<option value='".$registro['idOperacion']."'>".utf8_encode($registro['descripcion'])."</option>";
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
                      <label for="idvehiculo" class="col-sm-2 control-label">Vehículo</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="idvehiculo">
                          <option value='0'>Seleccione...</option>
                          <?php
                          while ($registro=$camiones->fetch()) {
                            echo "<option value='".$registro['idVehiculo']."'>".utf8_encode($registro['descripcion'])."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kilometros" class="col-sm-2 control-label">Kilómetros</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kilometros" placeholder="Kilómetros..." style="width:100px;" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="posicion" class="col-sm-2 control-label">Posición</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="posicion" placeholder="Posición..." maxlength="2" style="width:100px;" />
                          </div>
                          <div class="col">
                            <button type="button" style="width:70px;" class="btn btn-block btn-default" data-toggle='modal' data-target='#modal-posicion' onclick=''>Ayuda...</button>
                            <!--a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick=''>Ver...</a-->
                          </div>
                        </div>
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
          <button class="btn btn-default" onclick="cancelarHistorial()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="guardarHistorial()">Guardar</button>
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

<div id="mostrarHistorial">
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

<div class="modal fade" id="modal-posicion">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Escoger posición del neumático...</h4>
      </div>
      <div class="modal-body">
          <table style="margin:auto;" border=0 width="70%" cellspacing=10>
            <tr><td class="rueda" onclick="javascript:posicion(1);" data-dismiss="modal">&nbsp;<br>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(2);" data-dismiss="modal">&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td class="rueda" onclick="javascript:posicion(3);" data-dismiss="modal">&nbsp;<br>&nbsp;</td><td class="rueda" onclick="javascript:posicion(4);" data-dismiss="modal">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(5);" data-dismiss="modal" >&nbsp;</td><td class="rueda" onclick="javascript:posicion(6);" data-dismiss="modal">&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td class="rueda" onclick="javascript:posicion(7);" data-dismiss="modal">&nbsp;<br>&nbsp;</td><td class="rueda" onclick="javascript:posicion(8);" data-dismiss="modal">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(9);" data-dismiss="modal">&nbsp;</td><td class="rueda" onclick="javascript:posicion(10);" data-dismiss="modal">&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td class="rueda" onclick="javascript:posicion(11);" data-dismiss="modal">&nbsp;<br>&nbsp;</td><td class="rueda" onclick="javascript:posicion(12);" data-dismiss="modal">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(13);" data-dismiss="modal">&nbsp;</td><td class="rueda" onclick="javascript:posicion(14);" data-dismiss="modal">&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td class="rueda" onclick="javascript:posicion(15);" data-dismiss="modal">&nbsp;<br>&nbsp;</td><td class="rueda" onclick="javascript:posicion(16);" data-dismiss="modal">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(17);" data-dismiss="modal">&nbsp;</td><td class="rueda" onclick="javascript:posicion(18);" data-dismiss="modal">&nbsp;</td><td>&nbsp;</td><td class="rueda" onclick="javascript:posicion(19);" data-dismiss="modal">&nbsp;</td></tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <!--button type="button" class="btn btn-primary" onclick="" data-dismiss="modal">Aceptar</button-->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</section>
