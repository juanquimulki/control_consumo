          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registros consultados...</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Sección / Item</th>
                  <?php 
                  for ($i=1;$i<=30;$i++) {
                    echo "<th>$i</th>";
                  }
                  ?>
                </tr>
                <?php 
                foreach ($arreglo as $arr) {
                    echo "<tr>";
                    foreach ($arr as $a) {
                      if (is_numeric($a))
                        if ($a>0) {
                          echo "<td><a style='cursor:pointer' data-toggle='modal' data-target='#modal-default' onclick='javascript:detalles($a);'><i style='color:red' class='fa fa-fw fa-circle'></a></i></td>";
                        }
                        else
                          echo "<td>&nbsp;</td>";
                      else
                        echo "<td>".utf8_encode($a)."</td>";
                    }
                    echo "</tr>";
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->