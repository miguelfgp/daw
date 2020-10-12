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

<h3><h3>Generar en PHP un array bidimensional de 6 x 4 tal que cada fila contenga los sucesivos múltiplos de 3, desde el 3 en adelante. Mostrar el array en una tabla HTML</h3></h3>
<?php

    define('FILAS', 6);
    define('COLUMNAS', 4);

    $operando = 1;

    echo '<table>';

    for ($i = 1; $i <= FILAS; $i++){
        echo '<tr>';

        for ($j = 1; $j <= COLUMNAS; $j++){

            $multiplo = 3 * $operando;
            $matriz[$i][$j] = $multiplo;
            $operando++;

            echo '<td>' . $matriz[$i][$j] . '</td>';    
        }
    }

    echo '</table>';

?>
</body>
</html>