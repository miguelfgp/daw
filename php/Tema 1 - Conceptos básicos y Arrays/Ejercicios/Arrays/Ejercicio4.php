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

<h3>Escriba un programa que llene con números aleatorios (entre el -5 y el 5) una matriz de 5 * 6 y que imprima cuántos de los números almacenados son ceros, cuántos positivos y cuántos negativos</h3>
<?php

    define('FILAS', 5);
    define('COLUMNAS', 6);

    for ($i = -1; $i <= 1; $i++){
        $totales[$i] = 0;
    }
    
    
    echo '<table>';

    for ($i = 0; $i < FILAS; $i++){

        echo '<tr>';

        for ($j = 0; $j < COLUMNAS; $j++){

            $matriz[$i][$j] = rand(-5, 5);

            echo '<td>' . $matriz[$i][$j] . '</td>';

            if ($matriz[$i][$j] < 0){
                $totales[-1]++;
            } else if ($matriz[$i][$j] > 0){
                $totales[1]++;
            } else {
                $totales[0]++;
            }

        }

        echo '</tr>';
    }

    echo '</table><p>El total de números positivos es ' . $totales[1] . '<p>';
    echo '<p>El total de números negativos es ' . $totales[-1] . '<p>';
    echo '<p>El total de ceros es ' . $totales[0] . '<p>';
?>
</body>
</html>