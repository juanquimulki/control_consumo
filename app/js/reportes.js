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
  vehiculo  = $("#vehiculo").val();
  mesdesde  = $("#mes_desde").val();
  aniodesde = $("#anio_desde").val();
  meshasta  = $("#mes_hasta").val();
  aniohasta = $("#anio_hasta").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=mostrar",
    data: "vehiculo="+vehiculo+"&mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrar").html(data);
      rendimientoChart(vehiculo,mesdesde,aniodesde,meshasta,aniohasta);
      cargaChart(vehiculo,mesdesde,aniodesde,meshasta,aniohasta);
    }
  })   
}

function rendimientoChart(vehiculo,mesdesde,aniodesde,meshasta,aniohasta) {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_rendimiento",
    data: "vehiculo="+vehiculo+"&mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
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

function cargaChart(vehiculo,mesdesde,aniodesde,meshasta,aniohasta) {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_carga",
    data: "vehiculo="+vehiculo+"&mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
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