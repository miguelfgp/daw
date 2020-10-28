<?php

    include 'conversor.php';

    if(isset($_POST) && !empty($_POST)){
            
        $valor = $_POST['valor'];
        $conversor = new Conversor($valor);
        $divisa1 = $_POST['divisa1'];
        $divisa2 = $_POST['divisa2'];

        if ($divisa1 == $divisa2){
            echo "<h3>Selecciona dos divisas distintas</h3>";
        } else {
            $conversor->convertirDivisa($divisa1, $divisa2);
            $resultado = round($conversor->getValor(), 2);

            echo '<h3>' . $valor . ' ' . $divisa1 . ' son ' . $resultado . ' ' . $divisa2 . '</h3>';
        }
    }

?>