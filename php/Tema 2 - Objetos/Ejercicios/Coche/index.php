<?php 
    include 'coche.php';

    $coche = new Coche();

    //$coche->setTipoCombustible('Gasolina');
    echo $coche->getTipoCombustible() . '<br>';
    /*
    echo $coche->getCombustible() . '<br>';
    echo $coche->getVelocidad() . '<br>';
    echo $coche->getCombustibleMaximo() . '<br>';
    echo $coche->getLitrosReserva() . '<br>';

    echo $UNCBasket->getPosicion() . '<br>';
    
*/

    
?>