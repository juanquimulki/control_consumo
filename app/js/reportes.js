$(function () {
  fecha = new Date();
  $("#alerta").hide();
  
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
  $("#anio_hasta").val(fecha.getFullYear());
  $("#mes_hasta").val(fecha.getMonth()+1);

  var etiquetas = etiquetas_precios();
  var datos     = datos_precios();

  //-------------
  //- BAR CHART -
  //-------------
  var areaChartData = {
    labels  : JSON.parse(etiquetas), //['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Digital Goods',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : JSON.parse(datos)
      }
    ]
  }

  var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
  var barChart                         = new Chart(barChartCanvas)
  var barChartData                     = areaChartData
  barChartData.datasets[0].fillColor   = '#00a65a'
  barChartData.datasets[0].strokeColor = '#00a65a'
  barChartData.datasets[0].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  barChart.Bar(barChartData, barChartOptions)
})

function etiquetas_precios() {
  var cadena;
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_etiquetas",
    async: false,
    success: function(data) {
      cadena = data;
    }
  })
  return cadena;
}

function datos_precios() {
  var cadena;
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_datos",
    async: false,
    success: function(data) {
      cadena = data;
    }
  })
  return cadena;
}

function cancelar() {
  $("#vehiculo").val(0);
  
  fecha = new Date();
  $("#alerta").hide();
  
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
  $("#anio_hasta").val(fecha.getFullYear());
  $("#mes_hasta").val(fecha.getMonth()+1);
}

function cancelarHistorico() {
  fecha = new Date();
  $("#alerta").hide();
  
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
  $("#anio_hasta").val(fecha.getFullYear());
  $("#mes_hasta").val(fecha.getMonth()+1);
}

function cancelarChecklist() {
  fecha = new Date();
  $("#alerta").hide();
  
  $("#idvehiculo").val(0);
  $("#anio_desde").val(fecha.getFullYear());
  $("#mes_desde").val(fecha.getMonth()+1);
}

function mostrar() {
  vehiculo  = $("#vehiculo").val();
  mesdesde  = $("#mes_desde").val();
  aniodesde = $("#anio_desde").val();
  meshasta  = $("#mes_hasta").val();
  aniohasta = $("#anio_hasta").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=validar",
    data: "vehiculo="+vehiculo+"&mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        $("#alerta").hide();
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
    }
  }) 
}

function mostrarChecklist() {
  mesdesde  = $("#mes_desde").val();
  aniodesde = $("#anio_desde").val();
  idvehiculo = $("#idvehiculo").val();

  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=validarChecklist",
    data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&idvehiculo="+idvehiculo,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        $("#alerta").hide();
        $.ajax({
          type: "POST",
          url: "index.php?c=reportes&a=mostrarChecklist",
          data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&idvehiculo="+idvehiculo,
          beforeSend: function() {
            $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
          },
          success: function(data) {
            $("#mostrar").html(data);
          }
        })   
      }
    }
  })
}

function detalles(id) {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=detalles",
    data: "iddetalle="+id,
    success: function(data) {
      $("#iddetalle").val(id);
      $("#detalles").html(data);
    }
  })  
}

function solucionar() {
  id = $("#iddetalle").val();
  resultados = $("#resultados").val();
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=solucionar",
    data: "iddetalle="+id+"&resultados="+resultados,
    success: function(data) {
      mostrarChecklist();
    }
  })  
}

function mostrarHistorico() {
  mesdesde  = $("#mes_desde").val();
  aniodesde = $("#anio_desde").val();
  meshasta  = $("#mes_hasta").val();
  aniohasta = $("#anio_hasta").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=validarHistorico",
    data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        $("#alerta").hide();
        $.ajax({
          type: "POST",
          url: "index.php?c=reportes&a=mostrarHistorico",
          data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
          beforeSend: function() {
            $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
          },
          success: function(data) {
            $("#mostrar").html(data);
            litrosChart(mesdesde,aniodesde,meshasta,aniohasta);
            costosChart(mesdesde,aniodesde,meshasta,aniohasta);
          }
        })   
      }
    }
  }) 
}

function litrosChart(mesdesde,aniodesde,meshasta,aniohasta) {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_litros",
    data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
      // AREA CHART
      var area = new Morris.Area({
        element: 'litros-cargados',
        resize: true,
        data: JSON.parse(data),
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Litros x Mes'],
        lineColors: ['#a0d0e0'],
        hideHover: 'auto'
      });
    }
  })
}

function costosChart(mesdesde,aniodesde,meshasta,aniohasta) {
  $.ajax({
    type: "POST",
    url: "index.php?c=reportes&a=json_costos",
    data: "mesdesde="+mesdesde+"&aniodesde="+aniodesde+"&meshasta="+meshasta+"&aniohasta="+aniohasta,
    success: function(data) {
      // AREA CHART
      var area = new Morris.Area({
        element: 'costos-afrontados',
        resize: true,
        data: JSON.parse(data),
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Costos x Mes'],
        lineColors: ['#f5b7b1'],
        hideHover: 'auto'
      });
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
        lineColors: ['#f5b7b1'],
        hideHover: 'auto'
      });
    }
  })
}

function alerta(tipo,titulo,mensaje,icono) {
  $("#alerta").html('<div class="alert alert-'+tipo+' alert-dismissible">'+
          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
          '<h4><i class="icon fa '+icono+'"></i> '+titulo+':</h4>'+
          mensaje+
          '</div>');
  $("#alerta").show('fade');
}