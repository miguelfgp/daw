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

    // Actualizado, la comprobación final estaba mal puesta (6 en vez de 7)
    if (strlen($colorHex) == 7){
        echo strtoupper($colorHex);
    } else {
        echo 'Introduce 3 números entre 0 y 255';
    }
    
?>