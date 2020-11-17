<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Ejercicio Tema 5 (NBA) -  Miguel FGP</h1>

        <h3>Muestra el máximo anotador de un equipo</h3>

        <nav>
            <ul>
                <li><a href="equipos.php">Equipos</a></li>
                <li><a href="resultados.php">Resultados</a></li>
                <li><a href="jugadores.php">Jugadores</a></li>
                <li><a href="anotador.php">Max Anotador</a></li>
                <li><a href="asistente.php">Max Asistente</a></li>
            </ul>
        </nav>

        <form action="anotador.php" method="post">
            <label>Equipo:</label>
                <?php
                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $equipos = [
                        'name' => 'equipo',
                        'array' => $nba->listaEquipos(),
                        'fields' => 'nombre'
                    ];

                    if(isset($_POST['equipo']) && !empty($_POST['equipo'])){
                        $equipo = $_POST['equipo'];
                        $equipos['selected'] = $equipo;
                        $maxAnotador = $nba->maxAnotador($equipo);
                        
                        echo Utility::arrayToSelect($equipos);
                        echo '<h4>' .$maxAnotador['Nombre']. ' - ' .$maxAnotador['Puntos_por_partido']. ' Pts</h4>';
                    } else {
                        echo Utility::arrayToSelect($equipos);
                    }
                ?>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
