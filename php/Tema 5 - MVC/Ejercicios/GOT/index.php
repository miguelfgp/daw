<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Ejercicio Tema 5 (GOT) -  Miguel FGP</h1>

        <h3>Elige una opción</h3>

        <nav>
            <ul>
                <li><a href="actores.php">Actores</a></li>
                <li><a href="actoresTemp.php">Episodios</a></li>
            </ul>
        </nav>

        <div id="resumen">
            <?php
                require('lib/got.php');
                require('lib/util.php');

                $got = new GOT();

                $resumen = $got->resumen();

                echo '<h1>'. $resumen['title'] .'</h1>';
                echo '<p id="argumento">'. $resumen['plot'] .'</p>';
                echo '<p>'.$resumen['creators']. '</p>';
            ?>
        </div>
    </div>
</body>
</html>
