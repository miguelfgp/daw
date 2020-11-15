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

        <?php
            session_start();

            if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo '<h3 id="error">' . $_SESSION['error'] . '</h3>';
            }

            if (isset($_SESSION['success']) && !empty($_SESSION['success'])){
                echo '<h3 id="success">' . $_SESSION['success'] . '</h3>';
            }
        ?>

        <h3>Añadir Equipo</h3>

        <form action="" method="post" id="form">
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

        <h3>Modificar o borrar equipo</h3>
        <?php

            

            $refresh = "<META HTTP-EQUIV ='Refresh' Content ='0;'>";

            $headers = ['Nombre', 'Ciudad', 'Conferencia', 'División'];
            $equipos = $nba->listaEquiposCompleta();
            $campos = ['Nombre', 'Ciudad', 'Conferencia', 'Division'];
            $buttons = [['nombre' => 'Actualizar','url' => 'update'],
                    ['nombre' => 'Borrar','url' => 'delete']];

            echo Utility::arrayToFormTable($headers, $equipos, $campos, $buttons);



            if (isset($_POST['insert'])){
                
                $error = '';
                $nombre = $_POST['equipo'];
                $ciudad = $_POST['ciudad'];
                $conferencia = $_POST['conferencia'];
                $division = $_POST['division'];

                if (!$nba->insertEquipo($nombre, $ciudad, $conferencia, $division)){
                    $_SESSION['error'] = 'Inserción del equipo fallida';
                    $_SESSION['success'] = "";
                } else {
                    $_SESSION['success'] = "Inserción del equipo realizada correctamente";
                    $_SESSION['error'] = "";
                }
                echo $refresh;
            }  

            if (isset($_POST['delete']) && !empty($_POST['delete'])){
                $error = '';
                $equipo = $_POST['delete'];
                
                if (!$nba->deleteEquipo($equipo)){
                    $_SESSION['error'] = "Borrado del equipo fallido";
                    $_SESSION['success'] = "";
                } else {
                    $_SESSION['success'] = "Borrado del equipo realizado correctamente";
                    $_SESSION['error'] = "";
                }

                echo $refresh;
            }

            if (isset($_POST['update']) && !empty($_POST['update'])){
                $error = '';
                $equipo = $_POST['update'];
                
                $nombre = $_POST[$equipo.'_Nombre'];
                $ciudad = $_POST[$equipo.'_Ciudad'];
                $conferencia = $_POST[$equipo.'_Conferencia'];
                $division = $_POST[$equipo.'_Division'];

                if (!$nba->updateEquipo($equipo, $nombre, $ciudad, $conferencia, $division)){
                    $_SESSION['error'] = 'Modificación del equipo fallida';
                    $_SESSION['success'] = "";
                } else {
                    $_SESSION['success'] = "Modificación del equipo realizada correctamente";
                    $_SESSION['error'] = "";
                }
                echo $refresh;
            }         
        ?>
    </div>

</body>
</html>
