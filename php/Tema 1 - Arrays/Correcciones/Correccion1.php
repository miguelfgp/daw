<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="menu">
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

    <h3>Almacenar en un vector los 10 primeros números pares. Imprimir cada uno en una línea</h3>

    <?php

    $i = 0;
    $num = 1;
    $vector = array();

    while (count($vector) < 10){
        if ($num %2 == 0){
            $vector[$i] = $num;
            $i++;
        }

        $num++;
    }

    echo '<p>';

    foreach ($vector as $par){
        echo $par . '<br>';
    }

    echo '</p>';

    ?>


</body>
</html>