<?php
    header('Content-Type: application/json');

    function mostrarCursos(){
        $cursos = array('AngularJS','MongoDB','PHP','UX','Ruby');
        return $cursos;
    }

    function mostrarAlumnos(){
        $alumnos = array('Antonio','Hernan','Carlo','María Luz','Nicolás');
        return $alumnos;
    }

    if ($_GET['solicitud']=='cursos'){
        $resultados = mostrarCursos();
    }else if($_GET['solicitud'] == 'lista'){
        $resultados = mostrarAlumnos();
    }else{
        header('HTTP/1.1 405 Method Not Allowed');
        exit;
    }

    echo json_encode($resultados);
?>
