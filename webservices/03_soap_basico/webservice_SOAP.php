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
    //Configuramos el formato en el que vamos a describir nuestro web service
    //sus parametros son ("Nombre de WebService","Forma en la que se relacionan datos entre si clave:valor")
    $server->configureWSDL("Info Blog","urn: infoblog");
    $server->register("muestraPlanetas",
                    array(),//Definimos el o los parametrosque recibira la función como no recibimos alguno, el array se encuentra vacio
                    array('return'=>'xsd:string'), //Respuesta que devuelve cada vez que llamamos a muestraPlanetas
                    'urn:infoblog',//namespace
                    'urn:infoblog#muestraPlanetas',//Forma de invocar la acción dentro del WebService
                    'rpc',//Estilo
                    'encoded',//uso
                    'Muestra el contenido para el blog'//Descripción de lo que hace el WebService
                    );
    $server->register("muestraImagen",
                    array('categoria'=>'xsd:string'),//Definimos el o los parametrosque recibira la función como no recibimos alguno, el array se encuentra vacio
                    array('return'=>'xsd:string'), //Respuesta que devuelve cada vez que llamamos a muestraPlanetas
                    'urn:infoblog',//namespace
                    'urn:infoblog#muestraImagen',//Forma de invocar la acción dentro del WebService
                    'rpc',//Estilo
                    'encoded',//uso
                    'Muestra una imagen variable'//Descripción de lo que hace el WebService
                    );
    $server->service($HTTP_RAW_POST_DATA);

?>
