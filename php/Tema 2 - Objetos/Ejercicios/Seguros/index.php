<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Seguros) -  Miguel FGP</h1>

    <?php 

    include 'traits.php'; 

    // Probamos la clase factura

    $factura = new Factura('500');
    $factura2 = new Factura('1000');
    $factura3 = new Factura('2000');

    $cliente1 = new Cliente('12345678A', 'Miguel', 'González');
    $cliente2 = new Cliente('12345678B', 'Marina', 'Comitre');

    $factura->añadirCliente($cliente1);
    $factura->añadirCliente($cliente2);

    echo '<h3>Pruebas de la clase Factura</h3>';
    echo 'El cliente con DNI 12345678A es: ' . $factura->datosCliente('12345678A') . '<br>';
    echo 'El importe de la factura es: ' . $factura->totalSinIVA() . '<br>';
    echo 'El total de la factura con IVA es: ' . $factura->calculaIVA(500) . '<br>';
    echo 'El número de la primera factura es: ' . $factura->datosFactura() . '<br>';
    echo 'El número de la segunda factura es: ' . $factura2->datosFactura() . '<br>';
    echo 'El número de la tercera factura es: ' . $factura3->datosFactura() . '<br>';

    $indemnizado1 = new Indemnizado('12345678C', 'Rafael', 'Pérez');
    $indemnizacion = new Indemnizacion('1000', $indemnizado1);

    $indemnizacion->añadirCliente($cliente1);
    $indemnizacion->añadirCliente($cliente2);

    echo '<h3>Pruebas de la clase Indemnizacion</h3>';
    echo 'El cliente con DNI 12345678B es: ' . $indemnizacion->datosCliente('12345678B') . '<br>';
    echo 'El importe de la indemnización es: ' . $indemnizacion->totalSinIVA() . '<br>';
    echo 'El total de la indemnización con IVA es: ' . $indemnizacion->calculaIVA(1000) . '<br>';
    echo $indemnizacion->indemnizado() . '<br>';


?>
</body>
</html>

