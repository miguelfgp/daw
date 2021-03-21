<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">
        <?php
            require 'classes/seguridad.php';
            require 'classes/usuarios.php';

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            if (isset($user)){
                header('Location: ./index.php');
            } else {
                echo '<h3>Debes iniciar sesión para acceder a esta página</h3>';
                echo '<a href="login.php">Accede a tu cuenta</a><br>';
                echo '<a href="registro.php">Crear una cuenta</a><br>';
            }
        ?>
    </div>
</body>
</html>