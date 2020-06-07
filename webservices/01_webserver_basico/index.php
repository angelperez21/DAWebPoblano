<?php
/*
Destro de index vamos a consumir lo que va a ser nuestro webservices con curl
vamos a poder obtener archivos, revisarlos, y revisar su metadata
*/

    $curl=curl_init("http://angel/practicas/webservices/01_webserver_basico/base.txt");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta =curl_exec($curl);
    $info = curl_getinfo($curl);
    if($info['http_code'] == 200){
        $datos = explode(",", $respuesta);
        echo "<h1>Frutas en mi tienda</h1>";
        foreach($datos as $fruta){
            echo "-> ".$fruta."<br>";
        }
    }else{
        echo "Error". curl_error($curl);
    }
?>