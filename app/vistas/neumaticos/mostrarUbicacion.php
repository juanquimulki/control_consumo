<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubicación...</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php //var_dump($arreglo); ?>
        <table style="margin:auto;" border=0 width="70%" cellspacing=10>
          <tr>
            <td class="rueda" <?php echo ($arreglo[1]&&$arreglo[1]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(1);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[1]; ?>');"><?php echo ($arreglo[1]?$arreglo[1]:"&nbsp;"); ?><br>&nbsp;</td>
            <td colspan=4 class="titulo"><?php echo $vehiculo['descripcion']; ?></td>
            <td class="rueda" <?php echo ($arreglo[2]&&$arreglo[2]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(2);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[2]; ?>');"><?php echo ($arreglo[2]?$arreglo[2]:"&nbsp;"); ?><br>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="rueda" <?php echo ($arreglo[3]&&$arreglo[3]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(3);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[3]; ?>');"><?php echo ($arreglo[3]?$arreglo[3]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[4]&&$arreglo[4]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(4);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[4]; ?>');"><?php echo ($arreglo[4]?$arreglo[4]:"&nbsp;"); ?><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[5]&&$arreglo[5]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(5);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[5]; ?>');"><?php echo ($arreglo[5]?$arreglo[5]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[6]&&$arreglo[6]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(6);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[6]; ?>');"><?php echo ($arreglo[6]?$arreglo[6]:"&nbsp;"); ?><br>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="rueda" <?php echo ($arreglo[7]&&$arreglo[7]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(7);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[7]; ?>');"><?php echo ($arreglo[7]?$arreglo[7]:"&nbsp;"); ?></a><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[8]&&$arreglo[8]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(8);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[8]; ?>');"><?php echo ($arreglo[8]?$arreglo[8]:"&nbsp;"); ?><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[9]&&$arreglo[9]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(9);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[9]; ?>');"><?php echo ($arreglo[9]?$arreglo[9]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[10]&&$arreglo[10]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(10);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[9]; ?>');"><?php echo ($arreglo[10]?$arreglo[10]:"&nbsp;"); ?><br>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="rueda" <?php echo ($arreglo[11]&&$arreglo[11]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(11);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[11]; ?>');"><?php echo ($arreglo[11]?$arreglo[11]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[12]&&$arreglo[12]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(12);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[12]; ?>');"><?php echo ($arreglo[12]?$arreglo[12]:"&nbsp;"); ?><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[13]&&$arreglo[13]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(13);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[13]; ?>');"><?php echo ($arreglo[13]?$arreglo[13]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[14]&&$arreglo[14]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(14);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[14]; ?>');"><?php echo ($arreglo[14]?$arreglo[14]:"&nbsp;"); ?><br>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="rueda" <?php echo ($arreglo[15]&&$arreglo[15]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(15);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[15]; ?>');"><?php echo ($arreglo[15]?$arreglo[15]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[16]&&$arreglo[16]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(16);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[16]; ?>');"><?php echo ($arreglo[16]?$arreglo[16]:"&nbsp;"); ?><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[17]&&$arreglo[17]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(17);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[17]; ?>');"><?php echo ($arreglo[17]?$arreglo[17]:"&nbsp;"); ?><br>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[18]&&$arreglo[18]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(18);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[18]; ?>');"><?php echo ($arreglo[18]?$arreglo[18]:"&nbsp;"); ?><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="rueda" <?php echo ($arreglo[19]&&$arreglo[19]==$codigo?"style='background-color:red;'":""); ?> onclick="javascript:posicion(19);"><br><a data-toggle='modal' data-target='#modal-default' onclick="infoNeuma('<?php echo $arreglo[19]; ?>');"><?php echo ($arreglo[19]?$arreglo[19]:"&nbsp;"); ?><br>&nbsp;</td>
          </tr>
        </table>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
