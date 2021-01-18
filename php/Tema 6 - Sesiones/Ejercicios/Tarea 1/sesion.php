<?php
    session_start();

    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $_SESSION['nombre'] = $_POST['nombre'];
        echo '<h3>Último nombre introducido ' . $_SESSION['nombre'] . '</h3>';
    } else {
        echo '<h3>No has introducido ningún nombre</h3>';
    }

    echo '<a href="nombre.php">Volver</a>'
?>