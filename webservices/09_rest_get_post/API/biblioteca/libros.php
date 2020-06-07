<?php
    //Formato de respuesta de tipo JSON
    header('Content-Type: application/json');
    //Datos de conexion a Base de Datos
    $username = "angel";
    $password = "210313";
    $hostname = "localhost";
    //Conectando con la base de datos
    $conexion = mysqli_connect($hostname,$username,$password) or die("No possible connect to MySQL");
    //Seleccionando la base de datos
    $dbs = mysqli_select_db($conexion,"phpws") or die ("No possible connect to DB");
    function mostrarTitulos($detalle){
        global $conexion;
        if($detalle == 'lista'){
            $resultado = mysqli_query($conexion,"SELECT titulo FROM libros") or die ("bad request to the DB");
        }else{
            $resultado = mysqli_query($conexion,"SELECT titulo FROM libros WHERE id=".$detalle) or die ("bad request to the DB");
        }
        while($fila = mysqli_fetch_array($resultado)){
            $allTitles[] = $fila;
        }
        return $allTitles;
    }

    function mostrarAutores($detalle){
        global $conexion;
        if($detalle == 'lista'){
            $resultado = mysqli_query($conexion,"SELECT autor FROM libros") or die ("bad request to the DB");
        }else{
            $resultado = mysqli_query($conexion,"SELECT autor FROM libros WHERE id=".$detalle) or die ("bad request to the DB");
        }
        while($fila = mysqli_fetch_array($resultado)){
            $allTitles[] = $fila;
        }
        return $allTitles;
    }

    function guardarNuevoAutor(){
        global $conexion;
        mysqli_query($conexion,"INSERT INTO libros (autor,titulo) VALUES ('".$_POST['autor']."','".$_POST['titulo']."')") or die ("bad request to the DB");
        header('Location: ../../../');
        exit;
    }

    if($_GET['peticion']=='titulo'){
        $resultados=mostrarTitulos( $_GET['detalle'] );
    }elseif($_GET['peticion']=='autor'){
        if($_GET['detalle']=="nuevo"){
            guardarNuevoAutor();
        }else{
            $resultados=mostrarAutores( $_GET['detalle'] );
        }
    }else {
        header('HTTP/1.1 405 Method Not Allowed');
        exit;
    }

    echo json_encode($resultados);
?>
