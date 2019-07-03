<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Cálculo de Rodaje</small>
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
            </form>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!--button class="btn btn-default" onclick="cancelar()">Cancelar</button-->
          <button class="btn btn-info pull-right" onclick="mostrarRodaje()">Mostrar</button>
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

<div id="mostrarRodaje">
</div>

</section>
