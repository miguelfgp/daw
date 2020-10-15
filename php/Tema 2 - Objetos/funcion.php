<?php
    function funcion(){
        $cadena = 'Función de ejemplo';
        return $cadena;
    }

    echo funcion();

    $cadena = 'Variable';

    function funcion2(){
        $cadena = 'Función de ejemplo';
    }

    $cadena = funcion2();

    echo $cadena;    
?>