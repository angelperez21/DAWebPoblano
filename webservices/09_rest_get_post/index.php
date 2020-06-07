<?php
    $autorURL = "http://angel/practicas/webservices/09_rest_get_post/API/biblioteca/autor/lista";
    $titulosURL = "http://angel/practicas/webservices/09_rest_get_post/API/biblioteca/titulo/lista";

    $autorJSON = file_get_contents($autorURL);
    $titulosJSON = file_get_contents($titulosURL);

    $autores = json_decode($autorJSON);
    $titulos = json_decode($titulosJSON);

    echo '<h1> Libros </h1>';
    echo '<ul>';
    foreach ($titulos as $titulo) {
        echo "<li>".$titulo->titulo."</li>";
    }
    echo '</ul>';

    echo '<h2> Autores </h2>';
    foreach ($autores as $autor) {
        echo "-> ".$autor->autor."<br>";
    }
?>

    <form action="API/biblioteca/autor/nuevo" method="POST">
        <h1> Agregar </h1>
        <label> Autor</label>
        <input type="text" name="autor">
        <label> Libro </label>
        <input type="text" name="titulo">
        <input type="submit" value="enviar">
    </form>
