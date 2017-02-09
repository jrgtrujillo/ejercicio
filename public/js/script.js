$(document).ready(function(){
  var paises = $("#pais");
  var route = "/pais";

  $.get(route, function(respuesta){
    $(respuesta).each(function(key, value){
      paises.append("<option value='"+value.id+"'>"+value.nombre+"</option");
    });
  });
});

$("#departamento").change(function(event){
  var ruta = "/ciudades/"+event.target.value;
  $.get(ruta, function(respuesta, estado){
    console.log(respuesta);
    $("#ciudad").empty();
    for(i=0; i<respuesta.length; i++){
      $("#ciudad").append("<option value='"+respuesta[i].id+"'>"+respuesta[i].nombre+"</option>")
    }
  });
});

$("#pais").change(function(event){
  var ruta = "/departamentos/"+event.target.value;
  $.get(ruta, function(respuesta, estado){
    console.log(respuesta);
    $("#departamento").empty();
    for(i=0; i<respuesta.length; i++){
      $("#departamento").append("<option value='"+respuesta[i].id+"'>"+respuesta[i].nombre+"</option>")
    }
  });
});
