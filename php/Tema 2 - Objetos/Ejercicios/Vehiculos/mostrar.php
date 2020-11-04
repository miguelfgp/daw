<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Vehículos) -  Miguel FGP</h1>

    <?php 

    include 'vehiculo.php'; 

    echo '<h3>Prueba vehículo</h3>';

    $vehiculo = new Vehiculo('negro', 1500);
    echo $vehiculo->circula() . '<br>';
    echo 'El vehículo pesa ' . $vehiculo->getPeso() . ' kgs<br>';
    $vehiculo->añadirPersona(70);
    echo 'El vehículo ahora pesa ' . $vehiculo->getPeso() . ' kgs<br>';

    echo '<h3>Prueba coche</h3>';

    $coche = new Coche('verde', 1400, 5, 4);
    echo 'El coche es ' . $coche->getColor() . ' y pesa ' . $coche->getPeso() . ' kgs<br>';
    $coche->añadirPersona(60);
    $coche->añadirPersona(60);
    echo 'El coche es ' . $coche->getColor() . ' y ahora pesa ' . $coche->getPeso() . ' kgs<br>';

?>
</body>
</html>

