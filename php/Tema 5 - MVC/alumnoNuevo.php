<?php

    require 'lib/escuela.php';

    if((isset($_POST['nombre']) && isset($_POST['apellidos']))
     && (!empty($_POST['nombre']) && !empty($_POST['apellidos']))){
        $escuela = new Escuela();

        if (!empty($_POST['edad'])){
            $escuela->insertarAlumno($_POST['nombre'], $_POST['apellidos'], $_POST['edad']);
        } else {
            $escuela->insertarAlumno($_POST['nombre'], $_POST['apellidos']);
        }

        echo 'Inserción realizada correctamente';
    } else {
        echo 'Inserción fallida';
    }
?>