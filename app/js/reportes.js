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