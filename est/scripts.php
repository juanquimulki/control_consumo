<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/raphael/raphael.min.js"></script>
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/chart.js/Chart.js"></script>
<!-- DataTables -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
<?php
if ($scripts) {
  foreach ($scripts as $s) {
    echo "<script src='http://".$GLOBALS['SERVER_NAME']."/control_consumo/app/js/$s?x=".mt_rand()."'></script>";
  }
} 
?>
