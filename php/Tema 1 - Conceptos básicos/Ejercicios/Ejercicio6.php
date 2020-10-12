<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <ul>
        <li><a href = "Ejercicio1.php">Ejercicio 1</a></li>
        <li><a href = "Ejercicio2.php">Ejercicio 2</a></li>
        <li><a href = "Ejercicio3.php">Ejercicio 3</a></li>
        <li><a href = "Ejercicio4.php">Ejercicio 4</a></li>
        <li><a href = "Ejercicio5.php">Ejercicio 5</a></li>
        <li><a href = "Ejercicio6.php">Ejercicio 6</a></li>
        <li><a href = "Ejercicio7.php">Ejercicio 7</a></li>
        <li><a href = "Ejercicio8.php">Ejercicio 8</a></li>
    </ul>
</nav>
<h1>Ejercicios Tema 1 -  Miguel FGP</h1>

<h3>Crearemos una tabla de valores de seno y coseno de -1 a 1 en incrementos de 0.1. Los valores negativos que resulten los queremos mostrar en rojo,y los valores positivos en azul..</h3>
<div class="contenedor">


<table><th colspan="2">Cálculos de Seno</th><th colspan="2">Cálculos de Coseno</th>
    <?php

    define ('LIMIT', 1);

    $fila = 1;

    for ($i=-1; $i<=LIMIT; $i = $i + 0.1){

        $seno = sin ($i);

        if ($fila % 2 == 0.0){
            echo '<tr class="par">';
        } else {
            echo '<tr>';
        }        
		
		echo '<td> Seno de ' . $i . '</td>';			


        if ($seno > 0){
            echo '<td class="positivo"> ';
        } else if ($seno < 0){
            echo '<td class="negativo"> ';
        }
		
        echo $seno . '</td>';

        $coseno = cos ($i);

        echo '<td> Coseno de ' . $i . '</td>';

        if ($coseno > 0){
            echo '<td class="positivo"> ';
        } else if ($coseno < 0){
            echo '<td class="negativo"> ';
        }

        echo $coseno . '</td></tr>';  
        
        $fila++;
    }
    
    ?>
</table>
</div>
</body>
</html>