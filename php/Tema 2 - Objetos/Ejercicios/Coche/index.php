<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Coche) -  Miguel FGP</h1>

    <table>
    <tr><th>Creamos una clase coche y mostramos su estado</th></tr>

    <?php 
    include 'coche.php';

    $coche = new Coche('Diesel', 60, 10);

    echo '<tr><td>' . $coche->estadoCoche() . '</td></tr>';
    
    echo '<tr><th>Intentamos repostar con el carburante equivocado</th></tr>';

    echo '<tr><td>' . $coche->repostar(70, 'Gasolina') . '</td></tr>';

    echo '<tr><th>Repostamos correctamente el vehículo, aunque intentamos más del máximo del depósito</th></tr>';
    echo '<tr><td>' . $coche->repostar(100, 'Diesel') . '</td></tr>';    
    echo '<tr><td>' . $coche->estadoCoche() . '</td></tr>';

    echo '<tr><th>Aceleramos el vehículo</th></tr>';

    echo '<tr><td>'. $coche->acelerar(50) . '</td></tr>';
    echo '<tr><td>' . $coche->estadoCoche() . '</td></tr>';  

    echo '<tr><th>Frenamos el vehículo e intentamos repostar</th></tr>';

    echo '<tr><td>' . $coche->frenar(20) . '</td></tr>';
    echo '<tr><td>' . $coche->estadoCoche() . '</td></tr>';
    echo '<tr><td>' . $coche->repostar(10, 'Diesel') . '</td></tr>';

    echo '<tr><th>Volvemos a frenar el vehículo hasta pararlo</th></tr>';

    echo '<tr><td>' . $coche->frenar(50) . '</td></tr>';
    echo '<tr><td>' . $coche->estadoCoche() . '</td></tr>';   
    
?>
</table>
</body>
</html>

