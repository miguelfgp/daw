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

<h3>Escriba un programa que muestre una tirada de un número de dados al azar entre 2 y 7 (dados) en indique los valores.</h3>
<?php

    $numero_dados = rand(2, 7);

    for ($i = 0; $i <= $numero_dados; $i++){
        $tirada[$i] = rand(1, 6);
    }
    
    echo '<p>El resultado de la tirada es: ';

    foreach ($tirada as $numero){
        echo $numero . ' ';
    }

    echo '<p>';

?>
</body>
</html>