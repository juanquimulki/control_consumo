<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tablero
    <small>Panel de control</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $vehiculos; ?></h3>

        <p>Vehículos</p>
      </div>
      <div class="icon">
        <i class="fa fa-truck"></i>
      </div>
      <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=vehiculos&a=index" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $operarios; ?></h3>

        <p>Operarios</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=operarios&a=index" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo number_format($litros,2,",","."); ?></h3>

        <p>Litros cargados (en el mes)</p>
      </div>
      <div class="icon">
        <i class="fa fa-battery-quarter"></i>
      </div>
      <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=cargas&a=index" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $tareas; ?></h3>

        <p>Tareas registradas</p>
      </div>
      <div class="icon">
        <i class="fa fa-gears"></i>
      </div>
      <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=trabajos&a=index" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  </div>
</section>
