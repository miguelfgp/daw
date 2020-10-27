<?php

    $colorHex = "#";

    if(isset($_POST) && !empty($_POST)){
        foreach ($_POST as $color){
            if(ctype_digit($color)){
                if($color > 0 || $color < 255){
                    $codigo = dechex($color);
                    if (strlen($codigo) < 2){
                        $colorHex .= 0 . $codigo;
                    } else {
                        $colorHex .= $codigo;
                    }
                }
            }
        }
    }

    if (strlen($colorHex) == 6){
        echo strtoupper($colorHex);
    } else {
        echo 'Introduce 3 números entre 0 y 255';
    }
    
?>