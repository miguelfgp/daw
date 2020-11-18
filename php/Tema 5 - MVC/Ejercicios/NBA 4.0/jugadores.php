<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Ejercicio Tema 5 (NBA) -  Miguel FGP</h1>

        <h3>Muestra la plantilla de un equipo</h3>

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
                        $plantilla = [
                            'array' => $nba->listaJugadores($equipo),
                            'fields' => ['Nombre', 'Procedencia', 'Altura', 'Peso', 'Posicion']
                        ];


                        echo Utility::arrayToSelect($equipos);
                        echo '<table><tr><th>Nombre</th><th>Procedencia</th><th>Altura</th><th>Peso</th><th>Posición</th>';
                        echo Utility::arrayToTable($plantilla);
                        echo '</table>';
                        
                    } else {
                        echo Utility::arrayToSelect($equipos);
                    }                    

                    
                ?>
            <input type="submit" value="Enviar">
        </form>
    </div>

</body>
</html>
