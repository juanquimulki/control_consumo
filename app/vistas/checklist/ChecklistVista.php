<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Checklist
    <small>Lista de verificación de novedades de vehículos</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <?php
  if ($_SESSION['perfil']<=2) {
  ?>
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
                  <label for="fecha" class="col-sm-2 control-label">Fecha</label>
                  <div class="col-sm-10">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="fecha" placeholder="dd/mm/aaaa" <?php echo ($_SESSION['comunes']['fecha']?"value='".$_SESSION['comunes']['fecha']."'":""); ?>>
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
                      $selected = ($registro['idVehiculo']==$_SESSION['comunes']['idvehiculo']?"selected":"");
                      echo "<option value='".$registro['idVehiculo']."' $selected>".utf8_encode($registro['descripcion'])."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="kilometros" class="col-sm-2 control-label">Kms/Hrs</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="kmshrs" placeholder="Kms/Hrs..." style="width:100px;" />
                </div>
              </div>
              <div class="form-group">
                <label for="idoperario" class="col-sm-2 control-label">Operario</label>
                <div class="col-sm-10">
                  <select class="form-control" id="idoperario">
                    <option value='0'>Seleccione...</option>
                    <?php
                    while ($registro=$operarios->fetch()) {
                      $selected = ($registro['idOperario']==$_SESSION['comunes']['idoperario']?"selected":"");
                      echo "<option value='".$registro['idOperario']."' $selected>".utf8_encode($registro['nombre'])." (".utf8_encode($registro['abreviatura']).")</option>";
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
          <button class="btn btn-default" onclick="imprimir()"><i class="fa fa-print"></i>&nbsp;Planilla</button>
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

    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Novedades...</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
          </div>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <!--button onclick="probar();">Boton</button-->
            <table style="width:100%;">
               <thead>
               <tr><th width="25%;">Sección/Item</th><th width="20%;">Atención</th><th>Detalles</th></tr>
               </thead>
               <tbody>
               <?php
               $seccion = "";
               while ($registro = $items->fetch()) {
                 if ($seccion!=$registro['seccion']) {
                   echo "<tr><td>".utf8_encode($registro['seccion']).":</td></tr>";
                   $seccion = $registro['seccion'];
                 }
                 echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($registro['item'])."</td>";
                 echo "<td>";
                 echo "<label class='switch'>
                 <input type='checkbox' class='clase_checks' id='check".$registro['idItem']."' onclick='mostrarDetalles(".$registro['idItem'].");' value='".$registro['idItem']."' />
                 <span class='slider round'></span>
                 </label>";
                 echo "</td>";
                 echo "<td><input class='clase_detalles' id='detalles".$registro['idItem']."' type='text' size=30 /></td>";
                 echo "</tr>\n";
               }
               ?>
               </tbody>
            </table>
          </div>
        <!-- /.box-body -->
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
        <p>¿Confirma que desea eliminar el registro?</p>
        <input id="id_eliminar" type="hidden" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="eliminar();" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</section>
