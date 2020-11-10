<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Ejercicio Tema 5 (NBA) -  Miguel FGP</h1>

        <h3>Muestra los resultados de un equipo</h3>

        <nav>
            <ul>
                <li><a href="resultados.php">Resultados</a></li>
                <li><a href="listas.php">Jugadores</a></li>
                <li><a href="anotador.php">Max Anotador</a></li>
                <li><a href="asistente.php">Max Asistente</a></li>
            </ul>
        </nav>

        <form action="" method="post">
                <?php
                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $equipos = $nba->listaEquipos();

                    $campo[] = 'nombre';

                    echo Utility::arrayToSelect('equipo', $equipos, $campo);
                ?>
            <input type="submit" value="Enviar">
        </form>

        <?php

            if(isset($_POST['equipo']) && !empty($_POST['equipo'])){
                $equipo = $_POST['equipo'];
                $partidos = $nba->listaPartidos($equipo);
                $campos = ['equipo_local', 'puntos_local', 'puntos_visitante', 'equipo_visitante'];

                echo '<table><tr><th>Local</th><th colspan="2">Resultado</th><th>Visitante</th>';
                echo Utility::arrayToRows($partidos, $campos);
                echo '</table>';
                
            }
        ?>
    </div>

</body>
</html>
