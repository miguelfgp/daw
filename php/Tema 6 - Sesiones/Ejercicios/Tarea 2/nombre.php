<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>

    <h3>Introduce un nombre</h3>

    <form action="sesion.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <input type="submit" value="Enviar">
    </form>

    <?php

        session_start();

        if (isset($_SESSION['nombre'])){
            echo '<h3>Listado de nombres: </h3><ul>';
            foreach ($_SESSION['nombre'] as $nombre){
                echo '<li><h3>'. $nombre .'<h3></li>';
            }

            echo '<form action="sesion.php" method="post">';
            echo '<button value="borrar">Borrar sesión</button>';
            echo '</form>';
        }
    ?>
</body>
</html>

