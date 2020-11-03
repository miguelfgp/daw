<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
<div id="main">
    <h1>Ejemplo Tema 4 (Alumnos) -  Miguel FGP</h1>

    <h3>Mostrar los paises de la base de datos</h3>

    <table>
        <tr>
            <th>Id</th>
            <th>País</th>
            <th>Continente</th>
        </tr>

    <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'paises', 3306);
        if ($mysqli->connect_errno){
            echo '<h3>Fallo al conectar MySQL (' . $mysqli->connect_errno . ': ' . $mysqli->connect_error . '</h3>';
        } else {
            echo '<h3>Conexión establecida correctamente</h3>';
        }

        $query = $mysqli->query('SELECT * FROM pais');
        
        for($i=0; $i<$query->num_rows;$i++){
            $row = $query->fetch_assoc();
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nombre'] . '</td>';
            echo '<td>' . $row['continente'] . '</td>';
            echo '</tr>';
        }
    ?>
    </table>

</div>
</body>
</html>

