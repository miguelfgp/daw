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

<h3>Queremos almacenar en una matriz el número de alumnos con el que cuenta una academia, ordenados en función del nivel y del idioma que se estudia. Tendremos 3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4 columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3 = Ruso). Se pide realizar la declaración de la matriz y asignarle los valores indicados en la siguiente imagen a cada elemento de las siguientes maneras (Crea un archivo PHP por cada una de estas maneras)</h3>

<h3>Con una sintaxis basada en el uso anidado de la palabra array, y mostrar por pantalla los alumnos que existen en cada nivel e idioma.</h3>

<?php

    $academia = array(
        array(
            "nivel" => "Nivel básico",
            0 => 1,
            1 => 14,
            2 => 8,
            3 => 3
        ),
        array(
            "nivel" => "Nivel medio",
            0 => 6,
            1 => 19,
            2 => 7,
            3 => 2
        ),
        array(
            "nivel" => "Nivel avanzado",
            0 => 3,
            1 => 13,
            2 => 4,
            3 => 1
        )
    );
  
    echo '<table class="academia"><th></th><th>Inglés</th><th>Francés</th><th>Alemán</th><th>Ruso</th>';

    for ($i = 0; $i <= sizeof($academia) - 1; $i++){

        echo '<tr><td>' . $academia[$i]["nivel"]. '</td>';

        for ($j = 0; $j < sizeof($academia[$i]) - 1; $j++){

            echo '<td>' . $academia[$i][$j] . '</td>';

        }

        echo '</tr>';        
    }

?>
</body>
</html>