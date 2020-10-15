<?php 
    include 'coche.php';

    $coche1 = new Coche();
    $coche1->mostrarColor();
    $coche1->mostrarTipo();



    $coche2 = new Coche();
    $color = $coche2->getColor();
    echo 'El color del coche es ' .$color .'<br>';
    $coche2->mostrarTipo();

    
?>