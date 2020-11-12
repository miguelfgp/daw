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
            <h3>Añadir Equipo</h3>
            <label>Equipo: </label>
            <input type="text" name="equipo">
            <label>Ciudad: </label>
            <input type="text" name="ciudad">
                <?php
                
                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $conferencias = $nba->listaConferencias();
                    $campoConf[] = 'conferencia';

                    echo '<label>Conferencia: </label>' . Utility::arrayToSelect('conferencia', $conferencias, $campoConf);

                    $divisiones = $nba->listaDivision();
                    $campoDiv[] = 'division';

                    echo '<label>División: </label>' . Utility::arrayToSelect('division', $divisiones, $campoDiv);

                ?>
            <button type="submit" name="insert">Añadir</button>
        </form>        
        <?php

            // HACER EN UTIL.PHP TABLA EDITABLE DENTRO DE UN FORM

            $headers = ['Nombre', 'Ciudad', 'Conferencia', 'División'];
            $equipos = $nba->listaEquiposCompleta();
            $campos = ['Nombre', 'Ciudad', 'Conferencia', 'Division'];
            $buttons = [['nombre' => 'Actualizar','url' => 'update'],
                    ['nombre' => 'Borrar','url' => 'delete']];

            echo Utility::arrayToFormTable($headers, $equipos, $campos, $buttons);

            if (isset($_POST['insert'])){
                
                $nombre = $_POST['equipo'];
                $ciudad = $_POST['ciudad'];
                $conferencia = $_POST['conferencia'];
                $division = $_POST['division'];

                $nba->insertEquipo($nombre, $ciudad, $conferencia, $division);
                echo "<META HTTP-EQUIV ='Refresh' Content ='0;'>";
            }  

            if (isset($_POST['delete']) && !empty($_POST['delete'])){
                $equipo = $_POST['delete'];
                
                $nba->deleteEquipo($equipo);
                echo "<META HTTP-EQUIV ='Refresh' Content ='0;'>";
            }

            if (isset($_POST['update']) && !empty($_POST['update'])){
                $equipo = $_POST['update'];
                
                $nombre = $_POST[$equipo.'_Nombre'];
                $ciudad = $_POST[$equipo.'_Ciudad'];
                $conferencia = $_POST[$equipo.'_Conferencia'];
                $division = $_POST[$equipo.'_Division'];

                $nba->updateEquipo($equipo, $nombre, $ciudad, $conferencia, $division);
                echo "<META HTTP-EQUIV ='Refresh' Content ='0;'>";
            }
            
        ?>
    </div>

</body>
</html>
