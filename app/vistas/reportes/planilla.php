<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Planilla Mensual
    <small>Reporte de movimientos por mes del vehículo</small>
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
                <label for="maquina" class="col-sm-2 control-label">Vehículo</label>
                <div class="col-sm-10">
                  <select class="form-control" id="vehiculo">
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
                <label for="" class="col-sm-2 control-label">Desde</label>
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
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Hasta</label>
                <div class="col-sm-5">
                  <select class="form-control" id="mes_hasta">
                    <!--option value='0'>Seleccione...</option-->
                    <?php
                    foreach ($meses as $m) {
                      echo "<option value='".$m[0]."'>".$m[1]."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm-5">
                  <select class="form-control" id="anio_hasta">
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
          <button class="btn btn-default" onclick="cancelar()">Cancelar</button>
          <button class="btn btn-info pull-right" onclick="mostrar()">Mostrar</button>
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
