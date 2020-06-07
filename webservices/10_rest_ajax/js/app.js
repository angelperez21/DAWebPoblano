$(document).ready(function(){
    $("#libros").on('click',function(){
        $.getJSON("API/biblioteca/titulo/lista").done(function(datos_del_ws){
            $.each(datos_del_ws,function(indice,valor){
                $("#resultadosLibro ul").append("<li>"+valor.titulo+"</li>");
            })
        });
    });
    $("#autores").on('click',function(){
        $.getJSON("API/biblioteca/autor/lista").done(function(datos_del_ws){
            $.each(datos_del_ws,function(indice,valor){
                $("#resultadosAutor ul").append("<li>"+valor.autor+"</li>");
            })
        });
    });
});
