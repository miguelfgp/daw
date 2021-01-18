<?php
    session_start();

    if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        
        $_SESSION['nombre'][] = $_POST['nombre'];

        echo '<h3>Último nombre introducido ' . $_POST['nombre'] . '</h3>';
    } else {
        echo '<h3>No has introducido ningún nombre</h3>';
    }

    if(isset($_POST['borrar'])){
        session_destroy();
        echo '<h3>Sesión borrada</h3>';
    }

    echo '<a href="nombre.php">Volver</a>'
?>