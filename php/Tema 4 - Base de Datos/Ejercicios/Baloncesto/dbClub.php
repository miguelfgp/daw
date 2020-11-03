<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
<div id="main">
    <h1>Ejemplo Tema 4 (Alumnos) -  Miguel FGP</h1>

    <h3>Mostrar los datos del equipo almacenado en la base de datos</h3>

    <table>
        <tr>
            <th>Dorsal</th>
            <th>Nombre</th>
            <th>Posición</th>
            <th>Edad</th>
        </tr>

    <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'clubbasket', 3306);
        if ($mysqli->connect_errno){
            echo '<h3>Fallo al conectar MySQL (' . $mysqli->connect_errno . ': ' . $mysqli->connect_error . '</h3>';
        } else {
            echo '<h3>Conexión establecida correctamente</h3>';
        }

        $query = $mysqli->query('SELECT * FROM unicaja');
        
        for($i=0; $i<$query->num_rows;$i++){
            $row = $query->fetch_assoc();
            echo '<tr>';
            echo '<td>' . $row['numero'] . '</td>';
            echo '<td>' . $row['nombreJugador'] . '</td>';
            echo '<td>' . $row['posicion'] . '</td>';
            echo '<td>' . $row['edad'] . '</td>';
            echo '</tr>';
        }
    ?>
</table>
</div>
</body>
</html>

