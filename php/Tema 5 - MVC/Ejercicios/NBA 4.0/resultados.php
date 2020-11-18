<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Ejercicio Tema 5 (NBA) -  Miguel FGP</h1>

        <h3>Muestra los resultados entre dos equipos de una temporada</h3>

        <nav>
            <ul>
                <li><a href="equipos.php">Equipos</a></li>
                <li><a href="resultados.php">Resultados</a></li>
                <li><a href="jugadores.php">Jugadores</a></li>
                <li><a href="anotador.php">Max Anotador</a></li>
                <li><a href="asistente.php">Max Asistente</a></li>
            </ul>
        </nav>

        <form action="" method="post">
                <?php
                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $equiposLocales = [
                        'name' => 'equipo_local',
                        'array' => $nba->listaEquipos(),
                        'fields' => 'nombre'
                    ];

                    $equiposVisitantes = [
                        'name' => 'equipo_visitante',
                        'array' => $nba->listaEquipos(),
                        'fields' => 'nombre'
                    ];
                    
                    $temporadas = [
                        'name' => 'temporada',
                        'array' => $nba->listaTemp(),
                        'fields' => 'temporada'                        
                    ];

                    if(isset($_POST['equipo_local']) && !empty($_POST['equipo_local'])
                    && isset($_POST['equipo_visitante']) && !empty($_POST['equipo_visitante'])
                    && isset($_POST['temporada']) && !empty($_POST['temporada'])){

                        $equipoLocal = $_POST['equipo_local'];
                        $equipoVisitante = $_POST['equipo_visitante'];
                        $temporada = $_POST['temporada'];

                        $equiposLocales['selected'] = $equipoLocal;
                        $equiposVisitantes['selected'] = $equipoVisitante;
                        $temporadas['selected'] = $temporada;
                        
                        $partidos = [
                            'array' => $nba->partidosTemp($equipoLocal, $equipoVisitante, $temporada),
                            'fields' => ['equipo_local', 'puntos_local', 'puntos_visitante', 'equipo_visitante', 'temporada']
                        ];
        
                        echo '<div class="option"><label>Equipo Local: </label>' . Utility::arrayToSelect($equiposLocales) . '</div><br>';
                        echo '<div class="option"><label>Equipo Visitante: </label>' . Utility::arrayToSelect($equiposVisitantes) . '</div><br>';
                        echo '<div class="option"><label>Temporada: </label>' . Utility::arrayToSelect($temporadas) . '</div><br>';
        
                        echo '<table><tr><th>Local</th><th colspan="2">Resultado</th><th>Visitante</th><th>Temporada</th>';
                        echo Utility::arrayToTable($partidos);
                        echo '</table>';
                        
                    } else {
                        echo '<div class="option"><label>Equipo Local: </label>' . Utility::arrayToSelect($equiposLocales) . '</div><br>';
                        echo '<div class="option"><label>Equipo Visitante: </label>' . Utility::arrayToSelect($equiposVisitantes) . '</div><br>';
                        echo '<div class="option"><label>Temporada: </label>' . Utility::arrayToSelect($temporadas) . '</div><br>';
                    }
                ?>
            <input type="submit" value="Enviar">
        </form>

        <?php
        ?>
    </div>

</body>
</html>
