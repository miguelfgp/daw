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
            <input type="text" name="equipo">
            <label>Ciudad:</label>
            <input type="text" name="ciudad">
                <?php
                
                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $conferencias = $nba->listaConferencias();
                    $campoConf[] = 'conferencia';

                    echo Utility::arrayToSelect('conferencia', $conferencias, $campoConf);

                    $divisiones = $nba->listaDivision();
                    $campoDiv[] = 'division';

                    echo Utility::arrayToSelect('division', $divisiones, $campoDiv);

                    
                ?>
            <input type="submit" value="Enviar">
        </form>        
        <?php

            // HACER EN UTIL.PHP TABLA EDITABLE DENTRO DE UN FORM

            $equipos = $nba->listaEquiposCompleta();
            $campos = ['Nombre', 'Ciudad', 'Conferencia', 'Division'];
            $url = [['nombre' => 'Actualizar','url' => 'updateDB.php'],
                    ['nombre' => 'Borrar','url' => 'deleteDB.php']];

            echo '<table><tr><th>Nombre</th><th>Ciudad</th><th>Conferencia</th><th>División</th>';
            echo Utility::arrayToFormRows($equipos, $campos, $url);
            echo '</table>';

            /*
            if(isset($_POST['equipo']) && !empty($_POST['equipo'])){
                $equipo = $_POST['equipo'];
                $plantilla = $nba->listaJugadores($equipo);
                $campos = ['Nombre', 'Ciudad', 'Conferencia', 'División'];
            }
            */
        ?>
    </div>

</body>
</html>
