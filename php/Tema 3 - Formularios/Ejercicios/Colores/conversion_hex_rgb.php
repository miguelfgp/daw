<?php

$colorRGB = "rgb(";
$error = false;

if(isset($_POST) && !empty($_POST)){

    $colorHex = $_POST['colorHex'];

    // Comprueba que la cadena tiene exactamente 6 caracteres

    if (strlen($colorHex) == 6){

        // Comprueba que se introducen valores entre 0 y F

        for ($i = 0; $i < 6; $i++){
            $numero = substr($colorHex, $i, 1);
            $color = hexdec($numero);
            if(empty($color) && !empty($numero)){
                $error = true;
            }
        }

        // Si no se han producido errores, introduce los valores convertidos en un texto rgb()

        if (!$error){
            for ($j = 0; $j < 6; $j += 2){
                $color = hexdec(substr($colorHex, $j, 2));
                if ($j == 4){
                    $colorRGB .= $color . ')';
                } else {
                    if ($i % 2 == 0){
                        $colorRGB .= $color . ', ';
                    }
                    else {
                        $colorRGB .= $color;
                    }
                }
            }
        }
    } else {
        $error = true;
    }
}

if (!$error){
    echo $colorRGB;
} else {
    echo "El código debe tener 3 valores hexadecimales entre 00 y FF";
}

?>