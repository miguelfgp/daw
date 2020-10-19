<?php

$numeros = range(10, -10);
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', ' Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$mezcla = array_merge($numeros, $meses);

foreach ($mezcla as $elemento){
    echo $elemento . '<br>';
}

echo '<hr>';

shuffle($mezcla);

foreach ($mezcla as $elemento){
    echo $elemento . '<br>';
}

echo '<hr>';

print_r($mezcla);
    
?>