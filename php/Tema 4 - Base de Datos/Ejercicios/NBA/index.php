<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
<div id="main">
    <h1>Ejemplo Tema 4 (Equipos NBA) -  Miguel FGP</h1>

    <h3>Mostrar los datos de los jugadores según su posición</h3>

    <form action="index.php" method="post">
        <select name="posicion">
            <option value="G">Base</option>
            <option value="G-F">Escolta</option>
            <option value="F">Alero</option>
            <option value="C-F">Ala-Pívot</option>
            <option value="C">Pívot</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php

        if(isset($_POST) && !empty($_POST)){
            echo '<table><tr>';
            echo '<th>Posición</th>';
            echo '<th>Nombre</th>';
            echo '<th>Procedencia</th>';
            echo '<th>Equipo</th>';
            echo '<th>Altura</th>';
            echo '<th>Peso</th></tr>';

            $posicion = $_POST['posicion'];;
        
            $mysqli = new mysqli('localhost', 'root', '', 'nba', 3306);
            
            if ($mysqli->connect_errno){
                echo '<h3>Fallo al conectar MySQL (' . $mysqli->connect_errno . ': ' . $mysqli->connect_error . '</h3>';
            } else {
                echo '<h3>Conexión establecida correctamente</h3>';
            }

            $query = $mysqli->query('SELECT * FROM jugadores WHERE Posicion="'.$posicion.'"');
            
            for($i=0; $i<$query->num_rows;$i++){
                $row = $query->fetch_assoc();
                echo '<tr>';
                echo '<td>' . $row['Posicion'] . '</td>';            
                echo '<td>' . $row['Nombre'] . '</td>';
                echo '<td>' . $row['Procedencia'] . '</td>';
                echo '<td>' . $row['Nombre_equipo'] . '</td>';
                echo '<td>' . $row['Altura'] . '</td>';
                echo '<td>' . $row['Peso'] . '</td>';
                echo '</tr>';
            }
        }
    ?>
</table>
</div>
</body>
</html>

