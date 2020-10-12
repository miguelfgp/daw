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

<h3>Crear un array asociativo con la siguiente estructura:</h3> 

<p>Juan=>[altura=>175,pelo=>rubio,ojos=>azules]</p>
<p>María=>[altura=>168,pelo=>castaña,ojos=>marrones]</p>
<p>Pedro=>[altura=>180,pelo=>castaño,ojos=>verdes]</p>

<?php

    $array = array(
        "Juan"=>["altura"=>"1'75","pelo"=>"Rubio","ojos"=>">Azules"],
        "María"=>["altura"=>"1'68","pelo"=>"Castaña","ojos"=>"Marrones"],
        "Pedro"=>["altura"=>"1'80","pelo"=>"Castaño","ojos"=>"Verdes"]
    );

    echo '<h3>Mostrar por pantalla:</h3>';
    echo '<p>La altura de Juan: ' . $array['Juan']['altura'] . '</p>';
    echo '<p>Los ojos de María: ' . $array['María']['ojos'] . '</p>';
    echo '<p>El pelo de Pedro: ' . $array['Pedro']['pelo'] . '</p>';

?>
</body>
</html>