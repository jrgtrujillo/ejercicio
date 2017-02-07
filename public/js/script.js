$(document).ready(function(){
  var departamentos = $("#departamento");
  var route = "/departamento";

  $.get(route, function(respuesta){
    $(respuesta).each(function(key, value){
      departamentos.append("<option value='"+value.id+"'>"+value.departamento+"</option");
    });
  });
});

$("#departamento").change(function(event){
  var ruta = "/ciudades/"+event.target.value;
  $.get(ruta, function(respuesta, estado){
    console.log(respuesta);
    $("#ciudad").empty();
    for(i=0; i<respuesta.length; i++){
      $("#ciudad").append("<option value='"+respuesta[i].id+"'>"+respuesta[i].ciudad+"</option>")
    }
  });
});
