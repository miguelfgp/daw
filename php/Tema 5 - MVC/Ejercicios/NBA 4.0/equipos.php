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

        <?php
            session_start();

            if (isset($_SESSION['error'])){
                echo '<h3 id="error">' . $_SESSION['error'] . '</h3>';
                $_SESSION['error'] = "";
            }

            if (isset($_SESSION['success'])){
                echo '<h3 id="success">' . $_SESSION['success'] . '</h3>';
                $_SESSION['success'] = "";
            }
        ?>

        <h3>Añadir Equipo</h3>

        <form action="" method="post" id="form">
            <label>Equipo: </label>
            <input type="text" name="equipo" required>
            <label>Ciudad: </label>
            <input type="text" name="ciudad" required>
                <?php

                    require('lib/nba.php');
                    require('lib/util.php');

                    $nba = new NBA();

                    $conferencias = [
                        'name' => 'conferencia',
                        'array' => $nba->listaConferencias(),
                        'fields' => 'conferencia',
                    ];
                    
                    echo '<label>Conferencia: </label>' . Utility::arrayToSelect($conferencias);

                    
                    $divisiones = [
                        'name' => 'division',
                        'array' => $nba->listaDivisiones(),
                        'fields' => 'division',
                    ];
                    
                    echo '<label>División: </label>' . Utility::arrayToSelect($divisiones);
                    

                ?>
            <button type="submit" name="insert">Añadir</button>
        </form>

        <h3>Modificar o borrar equipo</h3>
        <?php

            $refresh = "<META HTTP-EQUIV ='Refresh' Content ='0;'>";

            $equipos = [
                'headers' => ['Nombre', 'Ciudad', 'Conferencia', 'División'],
                'array' => $nba->listaEquiposCompleta(),
                'fields' => [
                    [
                        'name' => 'Nombre',
                        'type' => 'input'
                    ],
                    [
                        'name' => 'Ciudad',
                        'type' => 'input'
                    ],
                    [
                        'name' => 'Conferencia',
                        'type' => 'select',
                        'list' => $conferencias
                    ],
                    [
                        'name' => 'Division',
                        'type' => 'select',
                        'list' => $divisiones
                    ]
                ],
                'buttons' => [
                    ['name' => 'Actualizar','action' => 'update'],
                    ['name' => 'Borrar','action' => 'delete']
                ]
            ];

            
            echo Utility::arrayToEditable($equipos);

            if (isset($_POST)){
                if (isset($_POST['insert'])){
                    $nombre = $_POST['equipo'];
                    $ciudad = $_POST['ciudad'];
                    $conferencia = $_POST['conferencia'];
                    $division = $_POST['division'];

                    $query = $nba->insertEquipo($nombre, $ciudad, $conferencia, $division);

                    if (!$query){
                        $_SESSION['error'] = 'Inserción del equipo fallida';
                        $_SESSION['success'] = "";
                    } else {
                        $_SESSION['success'] = "Inserción del equipo realizada correctamente";
                        $_SESSION['error'] = "";
                    }
                    echo $refresh;
                }  
    
                if (isset($_POST['delete']) && !empty($_POST['delete'])){
                    $equipo = $_POST['delete'];
                    
                    $query = $nba->deleteEquipo($equipo);

                    if (!$query){
                        $_SESSION['error'] = "Borrado del equipo fallido";
                        $_SESSION['success'] = "";
                    } else {
                        $_SESSION['success'] = "Borrado del equipo realizado correctamente";
                        $_SESSION['error'] = "";
                    }
    
                    echo $refresh;
                }
    
                if (isset($_POST['update']) && !empty($_POST['update'])){
                    $equipo = $_POST['update'];
                    
                    $nombre = $_POST[$equipo.'_Nombre'];
                    $ciudad = $_POST[$equipo.'_Ciudad'];
                    $conferencia = $_POST[$equipo.'_Conferencia'];
                    $division = $_POST[$equipo.'_Division'];

                    $query = $nba->updateEquipo($equipo, $nombre, $ciudad, $conferencia, $division);
    
                    if (!$query){
                        $_SESSION['error'] = 'Modificación del equipo fallida';
                        $_SESSION['success'] = "";
                    } else {
                        $_SESSION['success'] = "Modificación del equipo realizada correctamente";
                        $_SESSION['error'] = "";
                    }
                    echo $refresh;
                }       
            }
        ?>
    </div>

</body>
</html>
