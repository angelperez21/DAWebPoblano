<?php
    require_once "lib/nusoap.php";

    $username = "angel";
    $password = "210313";
    $hostname = "localhost";

    $conexion = mysqli_connect($hostname,$username,$password) or die("No possible connect to MySQL");
    $dbs = mysqli_select_db($conexion,"phpws") or die ("No possible connect to DB");
    $consulta = "SELECT * FROM libros;";
    $resultado = mysqli_query($conexion,$consulta) or die ("bad request");

    function muestraLibros(){
        global $resultado;
        while($row = mysqli_fetch_array($resultado)){
            $all[] = $row;
        }
        return $all;
    }

    if(!isset($HTTP_RAW_POST_DATA)){
        $HTTP_RAW_POST_DATA = file_get_contents('php://input');
    }

    $server = new soap_server();
    $server->register("muestraLibros");
    $server->service($HTTP_RAW_POST_DATA);
?>
