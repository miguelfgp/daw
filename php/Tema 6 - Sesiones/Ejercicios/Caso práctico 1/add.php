<?php

    if(isset($_POST['game']) && !empty($_POST['game']) && (isset($_POST['qt']) && !empty($_POST['qt']))){

        $game = $_POST['game'];
        $qt = $_POST['qt'];

        if(!isset($_COOKIE['games['.$game.']'])){
            setcookie('games['.$game.']', $qt);
            echo 'poraqui';
        } else {
            $qtUpdated = $qt + $_COOKIE['games['.$game.']'];
            setcookie('games['.$game.']', $qtUpdated);
            echo 'poralli';
        }
    }

    echo '<h3>Producto añadido a la cesta satisfactoriamente</h3>';
    echo '<a href="ssbm.php">Volver</a><br>';
    echo '<a href="carrito.php">Ver carrito</a>';
?>