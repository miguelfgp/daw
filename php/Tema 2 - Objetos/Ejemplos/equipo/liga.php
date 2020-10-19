<?php 

    require 'equipo.php';    
    
    $UNCBasket = new Equipo();
    $RMDBasket = new Equipo();

    $UNCBasket->ponerEquipo('Unicaja');
    $UNCBasket->mostrarEquipo();

    echo '<br>';

    $RMDBasket->ponerEquipo('Real Madrid');
    $RMDBasket->mostrarEquipo();

    echo '<br>';

    $UNCBasket->setPosicion(1);
    $RMDBasket->setPosicion(2);
    echo $UNCBasket->getPosicion() . '<br>';
    echo $RMDBasket->getPosicion() . '<br>';

    $nombre = 'FC Barcelona';
    $posicion = 0;

    $FCBBasket = new Equipo();
    $FCBBasket->mostrarEquipo();
    echo '<br>' . $FCBBasket->getPosicion() . '<br>';

?>