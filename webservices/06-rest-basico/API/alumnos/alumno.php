<?php
    header('Content-Type: application/json');
    function mostrar_Alumno(){
        $alumno = array(
                "nombre"=>"Ignacio",
                "apellido"=>"Diaz",
                "pais"=>"Chile",
                "cursos"=>"5",
                "usuario"=>"zapato123"
        );
        return $alumno;
    }

    echo json_encode(mostrar_Alumno());
?>
