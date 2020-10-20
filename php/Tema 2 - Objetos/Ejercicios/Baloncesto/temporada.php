<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Coche) -  Miguel FGP</h1>

    <h3>Crear un equipo de baloncesto con 9 jugadores y mostrar sus puntuaciones</h3>

    <table>
        <tr>
            <th>Nº Dorsal</th>
            <th>Puntuación total</th>
        </tr>
    <?php 
    
    include 'equipo.php'; 

    $jugadores = array();
    $equipo = new Equipo();

    for ($i = 0; $i < 9; $i++){
        $jugadores[$i] = new Jugador($i);
        $jugadores[$i]->addPtos(rand(20, 100));
    }

    foreach ($jugadores as $jugador){
        echo '<tr><td>' . $jugador->getNumJug() . '</td>';
        echo '<td>' . $jugador->getPtos() . '</td></tr>';
    }    

    $equipo->addJug($jugadores);

    echo '</table><p>La puntuación total del equipo esta temporada ha sido: ' . $equipo->getTotal() . '</p>';
    
?>
</body>
</html>

