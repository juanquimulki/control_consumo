<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="http://localhost/control_consumo/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/control_consumo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://localhost/control_consumo/bower_components/raphael/raphael.min.js"></script>
<script src="http://localhost/control_consumo/bower_components/morris.js/morris.min.js"></script>
<!-- DataTables -->
<script src="http://localhost/control_consumo/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/control_consumo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="http://localhost/control_consumo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/control_consumo/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
<?php
if ($scripts) {
  foreach ($scripts as $s) {
    echo "<script src='http://localhost/control_consumo/app/js/$s'></script>";
  }
} 
?>
