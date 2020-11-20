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
                <li><a href="listas.php">Jugadores</a></li>
                <li><a href="anotador.php">Max Anotador</a></li>
                <li><a href="asistente.php">Max Asistente</a></li>
            </ul>
        </nav>

        <form action="" method="post">
            <label>Equipo:</label>
                <?php
                    require('lib/nba.php');
                    require('lib/util.php');

                    $clubes = new Clubes();
                    $jugadores = new Jugadores();

                    $equipos = $clubes->listaEquipos();

                    $campo[] = 'nombre';

                    echo Utility::arrayToSelect('equipo', $equipos, $campo);
                ?>
            <input type="submit" value="Enviar">
        </form>

        <?php

            if(isset($_POST['equipo']) && !empty($_POST['equipo'])){
                $equipo = $_POST['equipo'];
                $plantilla = $jugadores->tablaJugadores($equipo);
                $campos = ['Nombre', 'Procedencia', 'Altura', 'Peso', 'Posicion'];

                echo '<table><tr><th>Nombre</th><th>Procedencia</th><th>Altura</th><th>Peso</th><th>Posición</th>';
                echo Utility::arrayToTable($plantilla, $campos);
                echo '</table>';
                
            }
        ?>
    </div>

</body>
</html>
