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

        <form action="" method="post">
            <label>Episodio:</label>
                <?php
                    require('lib/got.php');
                    require('lib/util.php');

                    $got = new GOT();

                    $episodios = $got->episodios();

                    $campo[] = 'episode';

                    echo Utility::arrayToSelect('episodios', $episodios, $campo);
                ?>
            <input type="submit" value="Enviar">
        </form>

        <?php

            if(isset($_POST['episodios']) && !empty($_POST['episodios'])){
                $episodio = $_POST['episodios'];
                $actores = $got->actoresEpisodio($episodio);
                $campos = ['name', 'serie_name', 'episode', 'season'];

            echo '<table><tr><th>Actor</th><th>Personaje</th><th>Nº Episodio</th><th>Temporada</th>';
            echo Utility::arrayToRows($actores, $campos);
            echo '</table>';
            }
        ?>
    </div>
</body>
</html>
