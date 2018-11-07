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
      areaChart();
    }
  })   
}

function areaChart() {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json",
    /*beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },*/
    success: function(data) {
      //alert(data);
      //var obj = JSON.parse(data);
      // AREA CHART
      var area = new Morris.Area({
        element: 'revenue-chart',
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