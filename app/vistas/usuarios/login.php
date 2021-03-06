<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Control | Cerámica Santiago</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/img/truck_1.png" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Sistema<b>Control</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Autentíquese para iniciar su sesión</p>

    <form action="index.php?c=usuarios&a=autenticar" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8" style="color:red;">
          <?php
          switch ($_GET['e']) {
            case "null":
              echo "Debe ingresar los datos...";
              break;
            case "user":
              echo "El usuario no existe...";
              break;
            case "pass":
              echo "La clave es incorrecta...";
              break;
            case "session":
              echo "Primero debe loguearse...";
              break;
          }
          ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
