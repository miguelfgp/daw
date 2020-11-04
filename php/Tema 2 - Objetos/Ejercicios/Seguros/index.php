<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Factura) -  Miguel FGP</h1>

    <h3>Crear un equipo de baloncesto con 9 jugadores y mostrar sus puntuaciones</h3>

    <?php 

    include 'factura.php'; 

    $factura = new Factura();
    $factura2 = new Factura();
    $factura3 = new Factura();

    $cliente1 = new Cliente('26809080G', 'Miguel', 'González');
    $cliente2 = new Cliente('26809081G', 'Marina', 'Comitre');

    $factura->añadirCliente($cliente1);
    $factura->añadirCliente($cliente2);

    echo $factura->datosCliente('26809080G') . '<br>';

    echo $factura->calculaIVA(20) . '<br>';

    echo $factura->datosFactura() . '<br>';
    echo $factura2->datosFactura() . '<br>';
    echo $factura3->datosFactura() . '<br>';

?>
</body>
</html>

