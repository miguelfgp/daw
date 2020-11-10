<?php

    require 'lib/alumnos.php';

    if((isset($_POST['nombre']) && !empty($_POST['nombre']))
     && (isset($_POST['apellidos']) && !empty($_POST['apellidos']))){
        $alumnos = new Alumnos();

        /*
        if (!empty($_POST['edad'])){
            $alumnos->añadirAlumno($_POST['nombre'], $_POST['apellidos'], $_POST['edad']);
            echo 'Inserción realizada correctamente';
        } else {
            $alumnos->añadirAlumno($_POST['nombre'], $_POST['apellidos']);
            echo 'Inserción realizada correctamente (Edad 18)';
        }
        */

        
    } else {
        echo 'Inserción fallida';
    }
?>