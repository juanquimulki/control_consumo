<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <!--img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"-->
        <img src="http://localhost/control_consumo/img/user_accounts.png" class="img-circle" alt="User Image">
        </div>
      <div class="pull-left info">
        <p>Usuario Genérico</p>
        <a href="#"><i class="fa fa-circle text-success"></i> desde 08/10/2018 - 18:10</a>
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
        <a href="http://localhost/control_consumo/index.php">
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
      <li class="<?php echo $opcion21; ?> treeview">
        <a href="#">
          <i class="fa fa-file"></i> <span>Archivos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $opcion21; ?>"><a href="http://localhost/control_consumo/src/operarios/index.php"><i class="fa fa-circle-o"></i> Operarios</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#">
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
      <li class="treeview">
        <a href="#">
          <i class="fa fa-keyboard-o"></i> <span>Registros</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Trabajos Realizados</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Cargas de Combustible</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-paper-plane"></i> <span>Reportes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Reporte uno</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Reporte dos</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Reporte tres</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Configuración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i> BackUp</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
