<?php
    $numeros = range(10, -10);

    foreach ($numeros as $numero){
        echo $numero . '<br>';
    }

    echo '<hr>';
    shuffle($numeros);
    
    foreach ($numeros as $numero){
        echo $numero . '<br>';
    }

    
?>