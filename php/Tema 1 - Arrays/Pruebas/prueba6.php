<?php
    $array = array(array('Uno', 'Dos'), array('Tres', 'Cuatro'), array ('Cinco', 'Seis'));

    foreach ($array as $mi_array){
        foreach ($mi_array as $valor){
            echo $valor .  '<br>';
        }
    }
?>