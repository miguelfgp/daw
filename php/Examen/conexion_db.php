<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $schema = '';
    $port = 3306;

    $conexion = new mysqli($host, $user, $pass, $schema, $port);

    if($conexion->connect_errno){
        echo '<h3>Fallo al conectar MySQL (' . $conexion->connect_errno . ': ' . $conexion->connect_error . '</h3>';
    }

    $consulta = 'SELECT * FROM alumnos';

    $query = $conexion->query($consulta);

    while ($fila = $query->fetch_assoc()){
        echo $fila;
    }
?>