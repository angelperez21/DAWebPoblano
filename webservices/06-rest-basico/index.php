<?php
    $url = "http://angel/practicas/webservices/06-rest-basico/API/alumnos/alumno.php";
    $JSON = file_get_contents($url);
    $datos = json_decode($JSON);
    echo "Nombre: ".$datos->nombre." ".$datos->apellido."<br>";
    echo "Pais: ".$datos->pais."<br>";
    echo "Cursos Activos: ".$datos->cursos."<br>";
    echo "Usuario: ".$datos->usuario."<br>";
?>
