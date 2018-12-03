function modalEliminar(id) {
  $("#id_eliminar").val(id);
}

function guardar() {
  $("#alerta").hide();
  var nombre  = $("#nombre").val();
  var usuario = $("#usuario").val();
  var perfil  = $("#perfil").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=usuarios&a=validar",
    data: "nombre="+nombre+"&usuario="+usuario+"&perfil="+perfil,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        $.ajax({
          type: "POST",
          url: "index.php?c=usuarios&a=guardar",
          data: "nombre="+nombre+"&usuario="+usuario+"&perfil="+perfil,
          success: function(data) {
            if (data!=0) {
              $("#id").val(data);
              alerta("success","Información","El registro ha sido guardado con éxito.<br>La clave por defecto es '1234'.","fa-check");
              mostrar();
            }
            else {
              alerta("error","Error","Hubo problemas al guardar.","fa-ban");
            }
          }
        })  
      }
    }
  })  
}

function cancelar() {
  $("#id").val("#");
  $("#nombre").val("");
  $("#usuario").val("");
  $("#perfil").val(0);
}

function guardarClave() {
  $("#alerta").hide();
  var actual   = $("#actual").val();
  var nueva    = $("#nueva").val();
  var confirma = $("#confirma").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=usuarios&a=validarClave",
    data: "actual="+actual+"&nueva="+nueva+"&confirma="+confirma,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        $.ajax({
          type: "POST",
          url: "index.php?c=usuarios&a=guardarClave",
          data: "actual="+actual+"&nueva="+nueva+"&confirma="+confirma,
          success: function(data) {
            if (data>=1) {
              alerta("success","Información","La clave ha sido cambiada con éxito.","fa-check");
            }
            else {
              alerta("error","Error","Hubo problemas al guardar.","fa-ban");
            }
          }
        })  
      }
    }
  })  
}

function cancelarClave() {
  $("#actual").val("");
  $("#nueva").val("");
  $("#confirma").val("");
}

function eliminar() {
  var id = $("#id_eliminar").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=usuarios&a=eliminar",
    data: "id="+id,
    success: function(data) {
      if (data=="1") {
        alerta("success","Información","El registro ha sido eliminado con éxito.","fa-check");
        mostrar();
      }
      else {
        alerta("error","Error","Hubo problemas al eliminar.","fa-ban");
      }
    }
  })  
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=usuarios&a=mostrar",
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
      "order": [],
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
  $("#alerta").hide();
  mostrar();
})