<?php
    require_once "lib/nusoap.php";
    $client = new nusoap_client("http://angel/practicas/webservices/04_soap_mysql/soap_mysql.php");
    $libros = $client->call("muestraLibros");
    echo "<h2> Mis libros </h2>";
    echo "<ul>";
    foreach ($libros as $item ) {
        echo '<li>';
        echo '<strong>'.$item['autor'].'</strong> <br>';
        echo $item['titulo'];
        echo '<br>';
        echo '<br>';
        echo '</li>';
    }
    echo "</ul>"
?>
