<style>
  .rueda {
    background-color: gray;
    border:2px solid black;
    cursor: pointer;
    width:100px;
    color:white;
    text-align:center;
  }
  .rueda:hover {
    background-color: black;
  }
  .rueda a {
    color: white;
  }
  .rueda a:hover {
    text-decoration: underline;
  }
  .titulo {
    font-weight: bold;
    font-size: 14pt;
    text-align: center;
  }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Ubicación de las Cubiertas</small>
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
                <label for="idneumatico" class="col-sm-2 control-label">Neumático</label>
                <div class="col-sm-10">
                      <select class="form-control" id="idneumatico" onclick="$('#idvehiculo').val(0);">
                        <option value='0'>Seleccione...</option>
                        <?php
                        while ($registro=$neumaticos->fetch()) {
                          echo "<option value='".$registro['idNeumatico']."'>(".$registro['codigo'].") ".utf8_encode($registro['marca'])." ".utf8_encode($registro['modelo'])."</option>";
                        }
                        ?>
                      </select>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="idvehiculo" class="col-sm-2 control-label">Vehículo</label>
                <div class="col-sm-10">
                  <select class="form-control" id="idvehiculo" onclick="$('#idneumatico').val(0);">
                    <option value='0'>Seleccione...</option>
                    <?php
                    while ($registro=$camiones->fetch()) {
                      echo "<option value='".$registro['idVehiculo']."'>".utf8_encode($registro['descripcion'])."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--button class="btn btn-default" onclick="cancelar()">Cancelar</button-->
          <button class="btn btn-info pull-right" onclick="mostrarUbicacion()">Mostrar</button>
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

<div id="mostrarUbicacion">
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del Neumático</h4>
      </div>
      <div class="modal-body" id="infoNeuma">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</section>
