function posicion(valor) {
  $("#posicion").val(valor);
}

function modalEliminar(id) {
  $("#id_eliminar").val(id);
}

function modificar(id) {
  //alert(id);
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=modificar",
    data: "id="+id,
    success: function(data) {
      arreglo = JSON.parse(data);
      //alert(arreglo.descripcion);

      $("#id").val(arreglo.idneumatico);
      $("#codigo").val(arreglo.codigo);
      $("#marca").val(arreglo.marca);
      $("#modelo").val(arreglo.modelo);
      $("#medida").val(arreglo.medida);
      $("#estado").val(arreglo.estado);
      $("#proveedor").val(arreglo.proveedor);
      $("#fecha").val(arreglo.fecha);
      $("#precio").val(arreglo.precio);
      $("#kilometros").val(arreglo.kilometros);
      $("#observaciones").val(arreglo.observaciones);
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
  var id     = $("#id").val();
  var codigo = $("#codigo").val();
  var marca  = $("#marca").val();
  var modelo = $("#modelo").val();
  var medida = $("#medida").val();
  var estado = $("#estado").val();
  var proveedor = $("#proveedor").val();
  var fecha  = $("#fecha").val();
  var precio = $("#precio").val();
  var kilometros    = $("#kilometros").val();
  var observaciones = $("#observaciones").val();

  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=validar",
    data: "codigo="+codigo+"&marca="+marca+"&modelo="+modelo+"&medida="+medida+"&estado="+estado+"&proveedor="+proveedor+"&fecha="+fecha+"&precio="+precio+"&kilometros="+kilometros+"&observaciones="+observaciones,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        if (id=="#") { //guardo
          url = "index.php?c=neumaticos&a=guardar";
          mje = "guardado";
        }
        else { //modifico
          url = "index.php?c=neumaticos&a=actualizar";
          mje = "actualizado";
        }
        $.ajax({
          type: "POST",
          url: url,
          data: "codigo="+codigo+"&marca="+marca+"&modelo="+modelo+"&medida="+medida+"&estado="+estado+"&proveedor="+proveedor+"&fecha="+fecha+"&precio="+precio+"&kilometros="+kilometros+"&observaciones="+observaciones+"&id="+id,
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

function guardarHistorial() {
  $("#alerta").hide();
  var id          = $("#id").val();
  var idneumatico = $("#idneumatico").val();
  var fecha       = $("#fecha").val();
  var idoperacion = $("#idoperacion").val();
  var destino     = $("#destino").val();
  var idvehiculo  = $("#idvehiculo").val();
  var kilometros  = $("#kilometros").val();
  var posicion    = $("#posicion").val();
  var observaciones = $("#observaciones").val();

  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=validarHistorial",
    data: "idneumatico="+idneumatico+"&fecha="+fecha+"&idoperacion="+idoperacion+"&destino="+destino+"&idvehiculo="+idvehiculo+"&kilometros="+kilometros+"&posicion="+posicion,
    success: function(data) {
      if (data) {
        alerta("warning","Atención",data,"fa-warning");
      }
      else {
        if (id=="#") { //guardo
          url = "index.php?c=neumaticos&a=guardarHistorial";
          mje = "guardado";
        }
        else { //modifico
          url = "index.php?c=neumaticos&a=actualizar";
          mje = "actualizado";
        }
        $.ajax({
          type: "POST",
          url: url,
          data: "idneumatico="+idneumatico+"&fecha="+fecha+"&idoperacion="+idoperacion+"&destino="+destino+"&idvehiculo="+idvehiculo+"&kilometros="+kilometros+"&posicion="+posicion+"&observaciones="+observaciones,
          success: function(data) {
            if (data!=0) {
              if (mje=="guardado") $("#id").val(data);
              alerta("success","Información","El registro ha sido "+mje+" con éxito.","fa-check");
              $("#boton_guardar").attr("disabled", "disabled")
              mostrarHistorial();
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
  $("#codigo").val("");
  $("#marca").val("");
  $("#modelo").val("");
  $("#medida").val("");
  $("#estado").val(0);
  $("#proveedor").val("");
  $("#fecha").val("");
  $("#precio").val("");
  $("#kilometros").val("");
  $("#observaciones").val("");
}

function cancelarHistorial() {
  $("#id").val("#");
  $("#idneumatico").val(0);
  $("#fecha").val("");
  $("#idoperacion").val(0);
  $("#divdestino").hide();
  $("#destino").val(0);
  $("#idvehiculo").val(0);
  $("#kilometros").val("");
  $("#posicion").val("");
  $("#observaciones").val("");
  $("#boton_guardar").removeAttr("disabled");
}

function mostrar() {
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=mostrar",
    beforeSend: function() {
      $("#mostrar").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrar").html(data);
      datatable();
    }
  })
}

function mostrarHistorial() {
  var id = $("#idneumatico").val();
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=mostrarHistorial",
    data: "id="+id,
    beforeSend: function() {
      $("#mostrarHistorial").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrarHistorial").html(data);
      //datatable();
    }
  })
}

function mostrarUbicacion() {
  var idn = $("#idneumatico").val();
  var idv = $("#idvehiculo").val();
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=mostrarUbicacion",
    data: "idv="+idv+"&idn="+idn,
    beforeSend: function() {
      $("#mostrarUbicacion").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrarUbicacion").html(data);
      //datatable();
    }
  })
}

function mostrarRodaje(actuales) {
  var id = $("#idneumatico").val();
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=mostrarRodaje",
    data: "id="+id+"&actuales="+actuales,
    beforeSend: function() {
      $("#mostrarRodaje").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#mostrarRodaje").html(data);
      //datatable();
    }
  })
}

function estadoActual() {
  var kmshrs = prompt("Ingrese Kms / Hrs actuales...");
  mostrarRodaje(kmshrs);
}

function infoNeuma(codigo) {
  $.ajax({
    type: "POST",
    url: "index.php?c=neumaticos&a=infoNeuma",
    data: "codigo="+codigo,
    beforeSend: function() {
      $("#infoNeuma").html("<center><img src='../img/loading.gif' width='100px' /></center>");
    },
    success: function(data) {
      $("#infoNeuma").html(data);
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

function divDestino(valor) {
  if (valor==3) {
    $("#divdestino").show();
  }
  else {
    $("#destino").val(0);
    $("#divdestino").hide();
  }
}

function imprimirStock() {
  window.open("index.php?c=neumaticos&a=imprimirStock","_blank");
}

function imprimirRecapados() {
  window.open("index.php?c=neumaticos&a=imprimirRecapados","_blank");
}

function imprimirRodaje() {
  id = $("#idneumatico").val();
  neumatico = $("#idneumatico option:selected").text();
  window.open("index.php?c=neumaticos&a=imprimirRodaje&id="+id+"&n="+neumatico,"_blank");
}

function imprimirHistorial() {
  id = $("#idneumatico").val();
  neumatico = $("#idneumatico option:selected").text();
  window.open("index.php?c=neumaticos&a=imprimirHistorial&id="+id+"&n="+neumatico,"_blank");
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
  //Date picker
  $('#fecha').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  })

  $("#alerta").hide();
  if ($("#mostrarHistorial").length) {
    mostrarHistorial(0);
  }
  else {
    if ($("#mostrarUbicacion").length) {
      mostrarUbicacion(0);
    }
    else {
      if ($("#mostrarRodaje").length) {
        mostrarRodaje(0);
      }
      else {
        mostrar();
      }
    }
  }
  if ($("#divdestino").length) {
    $("#divdestino").hide();
  }
})
