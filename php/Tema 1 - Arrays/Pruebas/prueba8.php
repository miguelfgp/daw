<?php
    $frutas = array ("a" => "limon", "c" => "pera", "b" => "manzana");
    asort($frutas);
    foreach ($frutas as $fruta){
        echo $fruta . '<br>';
    }

    
?>