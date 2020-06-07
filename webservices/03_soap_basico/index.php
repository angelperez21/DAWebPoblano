<?php
    require_once "lib/nusoap.php";
    $client = new nusoap_client("http://angel/practicas/webservices/02_soap_basico/webservice_SOAP.php?wsdl&debug=0",'wsdl');
    $planetas = $client->call("muestraPlanetas");
    $imagen = $client->call("muestraImagen",array("categoria"=>"espacio"));
    echo "<h2> Los planetas </h2>";
    echo "<p>".$planetas."</p>";
    echo $imagen

?>