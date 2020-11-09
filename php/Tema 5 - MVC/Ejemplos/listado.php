<?php
    require 'lib/alumnos.php';

    echo '<table><tr>';
    echo '<th>Id</th>';
    echo '<th>Nombre</th>';
    echo '<th>Apellidos</th>';
    echo '<th>Edad</th>';

    $alumnos = new Alumnos();

    $listadoAlumnos = $alumnos->verAlumnos();

    foreach ($listadoAlumnos as $alumno){
        echo '<tr>';
        echo '<td>' . $alumno['id'] . '</td>';            
        echo '<td>' . $alumno['nombre'] . '</td>';
        echo '<td>' . $alumno['apellidos'] . '</td>';
        echo '<td>' . $alumno['edad'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
?>