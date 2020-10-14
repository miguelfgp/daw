<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="menu">
        <ul>
            <li><a href = "Solucion1.php">Ejercicio 1</a></li>
            <li><a href = "Solucion2.php">Ejercicio 2</a></li>
            <li><a href = "Solucion3.php">Ejercicio 3</a></li>
            <li><a href = "Solucion4.php">Ejercicio 4</a></li>
            <li><a href = "">Ejercicio 5</a>
                <ul>
                    <li><a href = "Solucion5.1.php">Ejercicio 5.1</a></li>
                    <li><a href = "Solucion5.2.php">Ejercicio 5.2</a></li>
                    <li><a href = "Solucion5.3.php">Ejercicio 5.3</a></li>
                </ul>
            </li>
            <li><a href = "Solucion6.php">Ejercicio 6</a></li>
            <li><a href = "Solucion7.php">Ejercicio 7</a></li>
            <li><a href = "Solucion8.php">Ejercicio 8</a></li>
        </ul>
    </nav>
    <h1>Ejercicios Tema 1 (Arrays) -  Miguel FGP</h1>

    <h3>Almacenar en un vector los 10 primeros números pares. Imprimir cada uno en una línea</h3>

    <p>

    <?php

    $matriz = array();
    define('FILAS', 5);
    define('COLUMNAS', 6);
    $ceros = 0;
    $positivos = 0;
    $negativos = 0;
        
        
    for ($fila = 0; $fila < FILAS; $fila++){
        for($columna = 0; $columna < COLUMNAS; $columna++){
            $matriz[$fila][$columna] = rand(-5, 5);

            if ($matriz[$fila][$columna] == 0){
                $ceros++;
            }

        }
    }

    ?>

    </p>
</body>
</html>