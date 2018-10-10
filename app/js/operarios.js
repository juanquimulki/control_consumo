function guardar() {
  var nombre      = $("#nombre").val();
  var abreviatura = $("#abreviatura").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=guardar",
    data: "nombre="+nombre+"&abreviatura="+abreviatura,
    success: function(data) {
      $("#id").val(data);
      mostrar();
    }
  })  
}

function cancelar() {
  $("#id").val("#");
  $("#nombre").val("");
  $("#abreviatura").val("");
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=mostrar",
    success: function(data) {
      $("#mostrar").html(data);
      datatable();
    }
  })   
}

function datatable() {
  $('#tabla_registros').DataTable({
      "order": [[ 1, "asc" ]],
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 registros",
          "infoFiltered": "(Filtrado de _MAX_ registros)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin registros para mostrar",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
          }
      }
    });  
}

$(function () {
  mostrar();
})