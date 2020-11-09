<?php
    require 'lib/escuela.php';

    echo '<table><tr>';
    echo '<th>Id</th>';
    echo '<th>Nombre</th>';
    echo '<th>Apellidos</th>';
    echo '<th>Edad</th>';

    $escuela = new Escuela();

    $alumnos = $escuela->verAlumnos();

    for($i=0; $i<$alumnos->num_rows;$i++){
        $alumno = $alumnos->fetch_assoc();
        echo '<tr>';
        echo '<td>' . $alumno['id'] . '</td>';            
        echo '<td>' . $alumno['nombre'] . '</td>';
        echo '<td>' . $alumno['apellidos'] . '</td>';
        echo '<td>' . $alumno['edad'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
?>