<html>
<body>
<?php
    $edad = "";
    $nombre = "Pepe";
    if($edad >= 18 && $nombre == 'Pepe'){
        echo "<h1>Mayor de edad</h1>";
    } else if ($edad < 18 || $nombre != 'Pepe') {
        echo '<h1>Menor de edad</h1>';
    } else {
        echo '<h1>No puede acceder</h1>';
    }
?>
</body>
</html>