<?php
    //Formato de respuesta de tipo JSON
    header('Content-Type: application/json');
    //Agrega permisos para que otros usuario de otros dominos puedan entrar
    header("Access-Control-Allow-Origin: *");
    //Pueden acceder desde distintos versos de HTTP
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    //Datos de conexion a Base de Datos
    $username = "angel";
    $password = "210313";
    $hostname = "localhost";
    //Conectando con la base de datos
    $conexion = mysqli_connect($hostname,$username,$password) or die("No possible connect to MySQL");
    //Seleccionando la base de datos
    $dbs = mysqli_select_db($conexion,"proyecto") or die ("No possible connect to DB");
    //Definimos una busqueda en db
    $query="SELECT * FROM books";
    //Hacemos la consulta
    $result=mysqli_query($conexion,$query);
    //Creamos la base de datos en caso de que no exista
    if(empty($result)){
        $query="CREATE TABLE books (
                         email VARCHAR(128),
                         titulo VARCHAR(128),
                         autor VARCHAR(128),
                         status VARCHAR(128)
                      )";
        mysqli_query($conexion, $query);
    }

    function getuser(){
        global $conexion;
        $email=$_GET['email'];
        $consulta=mysqli_query($conexion,"SELECT * FROM users WHERE email = '$email'");
        while($fila = mysqli_fetch_array($consulta)){
            $allTitles[] = $fila;
        }
        foreach ($allTitles as $key) {
            $user=$key['name'];
        }
        return $user;
    }

    function getBooks($email){
        global $conexion;
        $query="SELECT * FROM books WHERE email='$email'";
        $consulta=mysqli_query($conexion,$query);
        while($fila = mysqli_fetch_array($consulta)){
            $allTitles[] = $fila;
        }
        return $allTitles;
    }

    function addBook($email){
        global $conexion;
        $name=getuser();
        $query="INSERT INTO books (email,titulo,autor,status) VALUES ('".$_GET['email']."','".$_POST['title']."','".$_POST['autor']."','".$_POST['status']."')";
        $queryV="SELECT * FROM books WHERE titulo = '".$_POST['title']."' AND autor = '".$_POST['autor']."'";
        $resul=mysqli_query($conexion,$queryV);
        while($fila = mysqli_fetch_array($resul)){
            $allTitles[] = $fila;
        }
        if(count($allTitles)==0){
            mysqli_query($conexion,$query)or die("Fallo al insertar datos");
        }
        header('Location: http://angel/practicas/proyecto/content.php?user='.$name."&email=".$email);
    }

    function updateBooks($email,$state){
        global $conexion;
        $name=getuser();
        $query="UPDATE books SET status='".$_POST['status']."' WHERE titulo='".$_POST['title']."' AND autor='".$_POST['autor']."'";
        mysqli_query($conexion,$query);
        header('Location: http://angel/practicas/proyecto/content.php?user='.$name."&email=".$email);
    }


    function deletebook($email){
        global $conexion;
        $query="DELETE FROM books where titulo='".$_POST['title']."' AND autor='".$_POST['autor']."'";
        mysqli_query($conexion,$query)or die ("error al elimnar datos");
        header('Location: http://angel/practicas/proyecto/content.php?user='.$name."&email=".$email);
    }

    if($_GET['action']=='activate'){
        if($_POST['action']=='add'){
            $resultado=addBook($_GET['email'],$_POST['status']);
        }else if($_POST['action']=='delete'){
            $resultado=deletebook($_GET['email']);
        }else if($_POST['action']=='mod'){
            updateBooks($_GET['email'],$_POST['status']);
        }
    }elseif($_GET['action']=='start'){
        $resultado=getBooks($_GET['email']);
    }


    echo json_encode($resultado);
?>
