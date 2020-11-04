<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
    <h1>Ejemplo Tema 4 (Beneficios) -  Miguel FGP</h1>

    <h3>Resultados del ejercicio</h3>

    <div id="nav">
        <nav>
            <ul>
                <li><a href="total.php">Total</a></li>
                <li><a href="ben_1.php">Beneficios Sem 1</a></li>
                <li><a href="ben_2.php">Beneficios Sem 2</a></li>
            </ul>
        </nav>
    </div>

    <table>
        <tr>
            <th>Semana</th>
            <th>Ventas</th>
            <th>Gastos</th>
            <th>Beneficios</th>
        </tr>

    <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'beneficios', 3306);
        if ($mysqli->connect_errno){
            echo '<h3>Fallo al conectar MySQL (' . $mysqli->connect_errno . ': ' . $mysqli->connect_error . '</h3>';
        } else {
            echo '<h3>Conexión establecida correctamente</h3>';
        }

        $query_gastos = $mysqli->query('SELECT num_semana, gasto FROM gastos WHERE num_semana=2');
        $query_ventas = $mysqli->query('SELECT num_semana, venta FROM ventas WHERE num_semana=2');
        
        for($i=0; $i<$query_gastos->num_rows;$i++){
            $gastos = $query_gastos->fetch_assoc();
            $ventas = $query_ventas->fetch_assoc();
            echo '<tr>';
            echo '<td>' . $ventas['num_semana'] . '</td>';
            echo '<td>' . $ventas['venta'] . '</td>';
            echo '<td>' . $gastos['gasto'] . '</td>';
            echo '<td>' . ($ventas['venta'] - $gastos['gasto']) . '</td>';            
            echo '</tr>';
        }

        $query_total_ventas = $mysqli->query('SELECT SUM(gasto) FROM gastos WHERE num_semana=2');
        $query_total_gastos = $mysqli->query('SELECT SUM(venta) FROM ventas WHERE num_semana=2');

        $total_gastos = $query_total_ventas->fetch_assoc();
        $total_ventas = $query_total_gastos->fetch_assoc();


        echo '<tr>';
        echo '<td><b>Total</b</td>';
        echo '<td>' . $total_ventas['SUM(venta)'] . '</td>';
        echo '<td>' . $total_gastos['SUM(gasto)'] . '</td>';
        echo '<td>' . ($total_ventas['SUM(venta)'] - $total_gastos['SUM(gasto)']) . '</td>';   
        echo '</tr>';
    ?>
    </table>

</div>
</body>
</html>