<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Baloncesto) -  Miguel FGP</h1>

    <h3>Crear un equipo de baloncesto con 9 jugadores y mostrar sus puntuaciones</h3>

    <table>
        <tr>
            <th>Nº Dorsal</th>
            <th>Puntuación total</th>
        </tr>
    <?php 
    
    include 'equipo.php'; 

    $jugador;
    $equipo = new Equipo();

    for ($i = 0; $i < 9; $i++){
        $jugador = new Jugador($i);
        $jugador->addPtos(rand(20, 100));
        $equipo->addJug($jugador);
    }
    
    foreach ($equipo->getJugadores() as $jugador){
        echo '<tr><td>' . $jugador->getNumJug() . '</td>';
        echo '<td>' . $jugador->getPtos() . '</td></tr>';
    }

    echo '</table><p>La puntuación total del equipo esta temporada ha sido: ' . $equipo->getTotal() . '</p>';
    
?>
</body>
</html>

