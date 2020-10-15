<?php 

    require 'equipo.php';    
    
    $UNCBasket = new Equipo();
    $RMDBasket = new Equipo();

    $UNCBasket->ponerEquipo('Unicaja');
    $UNCBasket->mostrarEquipo();
?>