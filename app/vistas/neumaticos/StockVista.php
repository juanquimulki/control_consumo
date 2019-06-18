<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Stock de Cubiertas</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tabla de datos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
          </div>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <th>#</th><th>Código</th><th>Marca</th><th>Modelo</th><th>Medida</th><th>Últ. Operación</th><th>Vehículo</th><th>Posición</th>
              </thead>
              <tbody>
                <?php
                $i=0;
                while ($registro=$neumaticos->fetch()) {
                  $i++;
                  echo "<tr>
                        <td><b>$i</b></td>
                        <td>".$registro['codigo']."</td>
                        <td>".$registro['marca']."</td>
                        <td>".$registro['modelo']."</td>
                        <td>".$registro['medida']."</td>
                        <td><b>".strtoupper($registro['operacion'])."</b></td>
                        <td>".$registro['vehiculo']."</td>
                        <td>".($registro['posicion']?$registro['posicion']:"")."</td>
                        <tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        <!-- /.box-body -->
        <!--div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div-->
      </div>

    </div>
  </div>

</section>
