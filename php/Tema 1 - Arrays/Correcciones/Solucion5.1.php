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

    $academia[0][0] = 1;
    $academia[0][1] = 14;
    $academia[0][2] = 8;
    $academia[0][3] = 3;
    $academia[1][0] = 6;
    $academia[1][1] = 19;
    $academia[1][2] = 7;
    $academia[1][3] = 2;
    $academia[2][0] = 3;
    $academia[2][1] = 13;
    $academia[2][2] = 4;
    $academia[2][3] = 1;

    $basico = 0;
    $medio = 0;
    $perfec=0;

    for($columna = 0; $columna < 4; $columna++){
        $basico += $academia[0][$columna];
    }

    for($columna = 0; $columna < 4; $columna++){
        $medio += $academia[1][$columna];
    }
    
    for($columna = 0; $columna < 4; $columna++){
        $perfec += $academia[2][$columna];
    }    

    echo '<h2>Niveles</h2>';
    echo 'Básico ' .$basico. '<br>';
    echo 'Medio ' .$medio. '<br>';
    echo 'Perfeccionamiento ' .$perfec. '<br>';

    $ingles = 0;
    $frances = 0;
    $aleman = 0;
    $ruso = 0;

    for($fila = 0; $fila < 3; $fila++){
        $ingles += $academia[$fila][0];
    }

    for($fila = 0; $fila < 3; $fila++){
        $frances += $academia[$fila][1];
    }
    
    for($fila = 0; $fila < 3; $fila++){
        $aleman += $academia[$fila][2];
    }

    for($fila = 0; $fila < 3; $fila++){
        $ruso += $academia[$fila][3];
    }

    echo '<h2>Idiomas</h2>';
    echo 'Ingles ' .$ingles. '<br>';
    echo 'Francés ' .$frances. '<br>';
    echo 'Alemán ' .$aleman. '<br>';
    echo 'Ruso ' .$ruso. '<br>';


    ?>

    </p>
</body>
</html>