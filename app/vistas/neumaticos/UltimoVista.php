<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>Último movimiento</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

<?php
  $i=1;
  while ($registro=$ultimos->fetch()) {
    if ($i==1) {
      echo '<div class="row">';
    }
    
    echo '<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">'.$registro['descripcion'].'</span>
          <span class="info-box-number">'.$registro['cantidad'].'</span>
        </div>
      </div>
    </div>';
    
    if ($i==4) {
      echo '</div>';
      $i=0;
    }
    $i++;
  }
?>
                          
</section>

<!-- Content Header (Page header) -->
<section class="content-header">
  <a name="arriba"></a>
  <h1>
    Neumáticos
    <small>En algún momento</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

<?php
  $i=1;
  while ($registro=$algunos->fetch()) {
    if ($i==1) {
      echo '<div class="row">';
    }
    
    echo '<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">'.$registro['descripcion'].'</span>
          <span class="info-box-number">'.$registro['cantidad'].'</span>
        </div>
      </div>
    </div>';
    
    if ($i==4) {
      echo '</div>';
      $i=0;
    }
    $i++;
  }
?>
                          
</section>
