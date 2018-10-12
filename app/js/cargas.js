function buscarCodigo(id) {
  $("#codigo").val(id);
  var texto = $("#maquina option:selected").text();
  $("#descripcion").val(texto);
}

function guardar() {
  $("#alerta").hide();
  var codigo      = $("#codigo").val();
  var descripcion = $("#descripcion").val();
  var iniciales   = $("#iniciales").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=vehiculos&a=guardar",
    data: "codigo="+codigo+"&descripcion="+descripcion+"&iniciales="+iniciales,
    success: function(data) {
      if (data!=0) {
        $("#id").val(data);
        alerta("success","Información","El registro ha sido guardado con éxito.","fa-check");
        mostrar();
      }
      else {
        alerta("error","Error","Hubo problemas al guardar.","fa-ban");
      }
    }
  })  
}

function cancelar() {
  $("#id").val("#");
  $("#fecha").val("");
  $("#idvehiculo").val("0");
  $("#litros").val("");
  $("#precinto").val("");
  $("#idoperario").val("0");
  $("#observaciones").val("");
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=vehiculos&a=mostrar",
    beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrar").html(data);
      datatable();
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
  //Date picker
  $('#fecha').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  })
  
  $("#alerta").hide();
  mostrar();
})