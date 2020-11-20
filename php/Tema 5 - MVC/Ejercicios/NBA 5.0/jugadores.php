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
                <?php
                    require('lib/nba.php');
                    require('lib/util.php');

                    session_start();

                    if (isset($_SESSION['error'])){
                        echo '<h3 id="error">' . $_SESSION['error'] . '</h3>';
                        $_SESSION['error'] = "";
                    }

                    if (isset($_SESSION['success'])){
                        echo '<h3 id="success">' . $_SESSION['success'] . '</h3>';
                        $_SESSION['success'] = "";
                    }

                    $clubes = new Clubes();
                    $jugadores = new Jugadores();
                    
                    $equipos = $clubes->listaEquipos();
                    $posiciones = $jugadores->listaPosiciones();
                        
                    if(isset($_POST['equipo']) && !empty($_POST['equipo']) || 
                    isset($_GET['equipo']) && !empty($_GET['equipo'])){

                        if (isset($_POST['equipo']) && !empty($_POST['equipo'])){
                            $equipo = $_POST['equipo'];
                        } else if (isset($_GET['equipo']) && !empty($_GET['equipo'])){
                            $equipo = $_GET['equipo'];
                        }

                        echo '<label>Equipo:</label>';
                        echo Utility::arrayToSelect('equipo', $equipos, 'nombre', $equipo);
                        echo '<input type="submit" value="Enviar"><br><br>';
                        
                        $plantilla = $jugadores->tablaJugadores($equipo);

                        echo '<form action="" method="post" id="form">';
                        echo '<label>Nombre: </label>';
                        echo '<input type="text" name="nombre_jugador">';
                        echo' <label>Procedencia: </label>';
                        echo' <input type="text" name="procedencia_jugador">';
                        echo' <label>Altura: </label>';
                        echo' <input type="text" name="altura_jugador">';
                        echo' <label>Peso: </label>';
                        echo' <input type="text" name="peso_jugador">';

                        echo '<label>Posición: </label>' . Utility::arrayToSelect('posicion_jugador', $posiciones, 'posicion'); 
                        echo '<button type="submit" name="insert">Añadir</button><br><br>';

                        $refresh = '<META HTTP-EQUIV ="Refresh" Content ="0; URL=jugadores.php?equipo='.$equipo.'">';
                                                
                        $headers = ['Nombre', 'Procedencia', 'Altura', 'Peso', 'Posición'];

                        $lista = $jugadores->tablaJugadores($equipo);
                        
                        $keys = [
                            [
                                'name' => 'codigo',
                                'type' => 'hidden'
                            ],
                            [
                                'name' => 'Nombre',
                                'type' => 'input'
                            ],
                            [
                                'name' => 'Procedencia',
                                'type' => 'input'
                            ],
                            [
                                'name' => 'Altura',
                                'type' => 'input'
                            ],
                            [
                                'name' => 'Peso',
                                'type' => 'input'
                            ],
                            [
                                'name' => 'Posicion',
                                'type' => 'select',
                                'array' => $posiciones,
                                'field' => 'posicion'
                            ]
                        ];

                        $buttons = [
                            ['name' => 'Actualizar','action' => 'update'],
                            ['name' => 'Borrar','action' => 'delete']
                        ];

                        echo Utility::arrayToEditable($lista, $buttons, $headers, $keys);

                        echo '<input type="hidden" value="'.$equipo.'">';

                        if (isset($_POST['insert'])){
                            $nombre = $_POST['nombre_jugador'];
                            $procedencia = $_POST['procedencia_jugador'];
                            $altura = $_POST['altura_jugador'];
                            $peso = $_POST['peso_jugador'];
                            $posicion = $_POST['posicion_jugador'];

                            $query = $jugadores->insertJugador($nombre, $procedencia, $altura, $peso, $posicion, $equipo);
            
                            if (!$query){
                                $_SESSION['error'] = 'Inserción del jugador fallida';
                                $_SESSION['success'] = "";
                            } else {
                                $_SESSION['success'] = "Inserción del jugador realizada correctamente";
                                $_SESSION['error'] = "";
                            }
                            echo $refresh;
                        }  
            
                        if (isset($_POST['delete']) && !empty($_POST['delete'])){
                            $id = $_POST['delete'];

                            $id = str_replace('_', ' ', $id);
                            
                            $query = $jugadores->deleteJugador($id);
            
                            if (!$query){
                                $_SESSION['error'] = "Borrado del jugador fallido";
                                $_SESSION['success'] = "";
                            } else {
                                $_SESSION['success'] = "Borrado del jugador realizado correctamente";
                                $_SESSION['error'] = "";
                            }
            
                            echo $refresh;
                        }
            
                        if (isset($_POST['update']) && !empty($_POST['update'])){
                            $id = $_POST['update'];

                            $nombre = $_POST[$id.'_Nombre'];
                            $procedencia = $_POST[$id.'_Procedencia'];
                            $altura = $_POST[$id.'_Altura'];
                            $peso = $_POST[$id.'_Peso'];
                            $posicion = $_POST[$id.'_Posicion'];
                            $id = str_replace('_', ' ', $id);
            
                            $query = $jugadores->updateJugador($id, $nombre, $procedencia, $altura, $peso, $posicion);
            
                            if (!$query){
                                $_SESSION['error'] = 'Modificación del jugador fallida';
                                $_SESSION['success'] = "";
                            } else {
                                $_SESSION['success'] = "Modificación del jugador realizada correctamente";
                                $_SESSION['error'] = "";
                            }
                            echo $refresh;
                        }

                    } else {
                        echo '<label>Equipo:</label>';
                        echo Utility::arrayToSelect('equipo', $equipos, 'nombre');
                        echo '<input type="submit" value="Enviar"><br><br>';
                    }
                        
                ?>
                </form>
            </div>

            </body>
            </html>
