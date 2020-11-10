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

        <?php
            require('lib/got.php');
            require('lib/util.php');

            $got = new GOT();

            $actores = $got->actores();
            $campos = ['name', 'serie_name', 'episodes', 'season_start', 'season_end'];

            echo '<table><tr><th>Actor</th><th>Personaje</th><th>Nº Episodios</th><th>Primera Temporada</th><th>Última Temporada</th>';
            echo Utility::arrayToRows($actores, $campos);
            echo '</table>';
        ?>
    </div>
</body>
</html>
