function modalEliminar(id) {
  $("#id_eliminar").val(id);
}

function modificar(id) {
  //alert(id);
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=modificar",
    data: "id="+id,
    success: function(data) {
      arreglo = JSON.parse(data);
      //alert(arreglo.descripcion);
      
      $("#id").val(arreglo.idoperario);
      $("#nombre").val(arreglo.nombre);
      $("#abreviatura").val(arreglo.abreviatura);
    }
  }) 
}

function eliminar() {
  var id = $("#id_eliminar").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=eliminar",
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

function guardar() {
  $("#alerta").hide();
  var id          = $("#id").val();
  var nombre      = $("#nombre").val();
  var abreviatura = $("#abreviatura").val();
  
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=validar",
    data: "nombre="+nombre+"&abreviatura="+abreviatura,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        if (id=="#") { //guardo
          url = "index.php?c=operarios&a=guardar";
          mje = "guardado";
        }
        else { //modifico
          url = "index.php?c=operarios&a=actualizar";
          mje = "actualizado";
        }
        $.ajax({
          type: "POST",
          url: url,
          data: "nombre="+nombre+"&abreviatura="+abreviatura+"&id="+id,
          success: function(data) {
            if (data!=0) {
              if (mje=="guardado") $("#id").val(data);
              alerta("success","Información","El registro ha sido "+mje+" con éxito.","fa-check");
              mostrar();
            }
            else {
              alerta("error","Error","Hubo problemas al ejecutar.","fa-ban");
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
  $("#abreviatura").val("");
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=operarios&a=mostrar",
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
          "infoEmpty": "Mostrando 0 a 0 de 0 registros",
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