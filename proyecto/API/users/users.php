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
    //Funcion de registro de nuevo usuario
    function addUser(){
        global $conexion;
        if(isset($_POST['email'])){
            $email=$_POST['email'];
            $pass=$_POST['passwd'];
            $name=$_POST['name'];
            $resul=mysqli_query($conexion,"SELECT * FROM users WHERE email = '$email'")
            or die ("DB die");
            while($fila = mysqli_fetch_array($resul)){
                $allTitles[] = $fila;
            }
            if (count($allTitles)==0) {
                mysqli_query($conexion,"INSERT INTO `users` (`name`, `email`, `passwd`) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['passwd']."')") or die ("DB die");
                header('Location: http://angel/practicas/proyecto/content.php?user='.$name."&email=".$email);
                exit;
            }else{
                header('Location: http://angel/practicas/proyecto/index.php?failedadd=true');
                exit;
            }
        }
    }

    function validateData(){
        global $conexion;
        if(isset($_POST['email'])){
            $email=$_POST['email'];
            $pass=$_POST['passwd'];
            $consulta=mysqli_query($conexion,"SELECT * FROM users WHERE email = '$email' AND passwd='$pass';");
            while($fila = mysqli_fetch_array($consulta)){
                $allTitles[] = $fila;
            }
            if(count($allTitles) == 1) {
                echo json_encode($allTitles);
                foreach ($allTitles as $key) {
                    $user=$key['name'];
                    $email=$key['email'];
                }
                header('Location: http://angel/practicas/proyecto/content.php?user='.$user."&email=".$email);
                exit;
            } else {
                header('Location: http://angel/practicas/proyecto/index.php?failed=true');
                exit;
            }
        }
    }

    if($_GET['action']=='new'){
        addUser();
    }elseif ($_GET['action']=='exists') {
        validateData();
    }
?>
