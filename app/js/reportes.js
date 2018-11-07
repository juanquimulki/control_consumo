$(function () {
  fecha = new Date();
  $("#alerta").hide();
  
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
  $("#anio_hasta").val(fecha.getFullYear());
  $("#mes_hasta").val(fecha.getMonth()+1);
})

function cancelar() {
  $("#vehiculo").val(0);
  
  fecha = new Date();
  $("#alerta").hide();
  
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
  $("#anio_hasta").val(fecha.getFullYear());
  $("#mes_hasta").val(fecha.getMonth()+1);
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=mostrar",
    beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrar").html(data);
      rendimientoChart();
      cargaChart();
    }
  })   
}

function rendimientoChart() {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_rendimiento",
    /*beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },*/
    success: function(data) {
      //alert(data);
      //var obj = JSON.parse(data);
      // AREA CHART
      var area = new Morris.Area({
        element: 'rendimiento-combustible',
        resize: true,
        data: JSON.parse(data),
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Kms/Hrs x Lt'],
        lineColors: ['#a0d0e0'],
        hideHover: 'auto'
      });
    }
  })
}

function cargaChart() {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_carga",
    /*beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },*/
    success: function(data) {
      //alert(data);
      //var obj = JSON.parse(data);
      // AREA CHART
      var area = new Morris.Area({
        element: 'carga-trabajo',
        resize: true,
        data: JSON.parse(data),
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Kms/Hrs x Día'],
        lineColors: ['#a0d0e0'],
        hideHover: 'auto'
      });
    }
  })
}