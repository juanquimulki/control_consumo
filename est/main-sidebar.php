<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <!--img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"-->
        <img src="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/img/user_accounts.png" class="img-circle" alt="User Image">
        </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['usuario']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> desde <?php echo $_SESSION['desde']; ?></a>
      </div>
    </div>

    <!-- search form -->
    <!--form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form-->
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ PRINCIPAL</li>
      <li class="<?php echo $opcion1; ?>">
        <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=tablero&a=index">
          <i class="fa fa-dashboard"></i> <span>Tablero</span>
          <!--span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span-->
        </a>
        <!--ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul-->
      </li>
      <li class="<?php echo $opcion21.$opcion22.$opcion23.$opcion24; ?> treeview">
        <a href="#">
          <i class="fa fa-file"></i> <span>Archivos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $opcion21; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=operarios&a=index"><i class="fa fa-circle-o"></i> Operarios</a></li>
          <li class="<?php echo $opcion22; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=precios&a=index"><i class="fa fa-circle-o"></i> Precios de Combustible</a></li>
          <li class="<?php echo $opcion23; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=items&a=index"><i class="fa fa-circle-o"></i> Items de Checklist</a></li>
          <li class="<?php echo $opcion24; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=particulares&a=index"><i class="fa fa-circle-o"></i> Particulares</a></li>
        </ul>
      </li>
      <li class="<?php echo $opcion3; ?>">
        <a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=vehiculos&a=index">
          <i class="fa fa-truck"></i> <span>Vehículos</span>
          <!--span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span-->
        </a>
        <!--ul class="treeview-menu">
          <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul-->
      </li>
      <li class="<?php echo $opcion41.$opcion42.$opcion43.$opcion44; ?> treeview">
        <a href="#">
          <i class="fa fa-keyboard-o"></i> <span>Registros</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $opcion41; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=cargas&a=index"><i class="fa fa-circle-o"></i> Cargas de Combustible</a></li>
          <li class="<?php echo $opcion42; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=trabajos&a=index"><i class="fa fa-circle-o"></i> Trabajos Realizados</a></li>
          <li class="<?php echo $opcion43; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=checklist&a=index"><i class="fa fa-circle-o"></i> Checklist de Novedades</a></li>
          <li class="<?php echo $opcion44; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=particulares&a=cargas"><i class="fa fa-circle-o"></i> Cargas a Particulares</a></li>
        </ul>
      </li>
      <li class="<?php echo $opcion51.$opcion52.$opcion53.$opcion54; ?> treeview">
        <a href="#">
          <i class="fa fa-paper-plane"></i> <span>Reportes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $opcion51; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=reportes&a=planilla"><i class="fa fa-circle-o"></i> Planilla Mensual</a></li>
          <li class="<?php echo $opcion52; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=reportes&a=precios"><i class="fa fa-circle-o"></i> Evolución de Precios</a></li>
          <li class="<?php echo $opcion53; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=reportes&a=historico"><i class="fa fa-circle-o"></i> Histórico de Consumo</a></li>
          <li class="<?php echo $opcion54; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=reportes&a=checklist"><i class="fa fa-circle-o"></i> Control de Checklists</a></li>
          <li class="<?php echo $opcion55; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=reportes&a=histcheck"><i class="fa fa-circle-o"></i> Histórico de Checklists</a></li>
        </ul>
      </li>
      <li class="<?php echo $opcion61; ?> treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Configuración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $opcion61; ?>"><a href="http://<?php echo $GLOBALS['SERVER_NAME']; ?>/control_consumo/app/index.php?c=usuarios&a=index"><i class="fa fa-circle-o"></i> Usuarios</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> BackUp</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
