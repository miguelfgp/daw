<html>
<body>
<?php

    // No se aconseja usarlo

    $paises = array('España', 'Portugal', 'Francia', 'Italia', 'Alemania', 'Reino Unido', 'Irlanda');

    foreach($paises as $pais){
        echo $pais . '<br>';
        if ($pais == 'Italia'){
            break;
        }
    }

    echo "<br><br>";

    foreach($paises as $pais){
        if ($pais == 'Italia'){
        continue;
    }        
        echo $pais . '<br>';
    }    
?>
</body>
</html>