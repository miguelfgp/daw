<?php
    $semana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
    echo $semana[1] . '<br>';
    $semana[7] = 'Jose';
    echo $semana[7] . '<br>';
    $otro = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    $otromas = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo', ['Mes','Año']);
    echo $otromas[7][1];
?>