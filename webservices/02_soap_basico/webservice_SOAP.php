<?php
    require_once "lib/nusoap.php";

    function muestraPlanetas(){
        $planteas='El Sistema Solar, reconocido por los astrólogos como "Nuestro Sistema", está compuesto por planetas y asteroides que giran en torno a la única estrella que da nombre al sistema, el Sol.. Todos los elementos que lo componen giran directa o indirectamente alrededor del Sol a causa de las tensiones creadas por la masa de cada cuerpo celeste.';
        return $planteas;
    }

    function muestraImagen($categoria){
        if($categoria=='espacio'){
            $imagen= 'imagen.jpg';
        }else {
            $imagen = 'imagen2.png';
        }
        $resultado = '<img src = "img/'.$imagen.'">';
        return $resultado;
    }

    if(!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    }

    $server = new soap_server();
    $server->register("muestraPlanetas");
    $server->service($HTTP_RAW_POST_DATA);
?>
