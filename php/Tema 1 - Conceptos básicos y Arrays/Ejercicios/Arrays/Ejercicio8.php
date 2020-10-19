<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="menu">>
        <ul>
            <li><a href = "Ejercicio1.php">Ejercicio 1</a></li>
            <li><a href = "Ejercicio2.php">Ejercicio 2</a></li>
            <li><a href = "Ejercicio3.php">Ejercicio 3</a></li>
            <li><a href = "Ejercicio4.php">Ejercicio 4</a></li>
            <li><a href = "">Ejercicio 5</a>
                <ul>
                    <li><a href = "Ejercicio5.1.php">Ejercicio 5.1</a></li>
                    <li><a href = "Ejercicio5.2.php">Ejercicio 5.2</a></li>
                    <li><a href = "Ejercicio5.3.php">Ejercicio 5.3</a></li>
                </ul>
            </li>
            <li><a href = "Ejercicio6.php">Ejercicio 6</a></li>
            <li><a href = "Ejercicio7.php">Ejercicio 7</a></li>
            <li><a href = "Ejercicio8.php">Ejercicio 8</a></li>
        </ul>
    </nav>

<h1>Ejercicios Tema 1 (Arrays) -  Miguel FGP</h1>

<h3>Crear un array de 6x6 con números enteros en PHP de forma que muestre por pantalla el array en forma de tabla HTML y el número de la fila cuya suma sea mayor que las demás</h3>
<?php

    define('FILAS', 6);
    define('COLUMNAS', 6);

    $fila_mayor = 0;
    $resultado_mayor = 0;    

    echo '<table><th colspan="6">Números enteros</th><th>Resultados</th>';

    for ($i = 1; $i <= FILAS; $i++){

        $resultados[$i] = 0;
        echo '<tr>';

        for ($j = 1; $j <= COLUMNAS; $j++){
            
            $matriz[$i][$j] = rand();
            echo '<td>' . $matriz[$i][$j] . '</td>';
            $resultados[$i] += $matriz[$i][$j];

            if ($resultados[$i] > $resultado_mayor){
                $resultado_mayor = $resultados[$i];
                $fila_mayor = $i;
            }            
        }

        echo '<td>' . $resultados[$i] . '</td></tr>';
    }

    echo '</table><p>La fila cuya suma da el mayor resultado es la: ' . ($fila_mayor) . '<p>';
?>
</body>
</html>