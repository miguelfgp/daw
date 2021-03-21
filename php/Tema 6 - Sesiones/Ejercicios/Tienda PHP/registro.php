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

            if (!isset($user)){

                $name = '';
                $surname = '';
                $mail = '';
                $pass = '';
                $pass2 = '';
                $mensaje = '';

                if ((isset($_POST['mail'])) && (isset($_POST['pass'])) && (isset($_POST['pass2'])) && (isset($_POST['name'])) && (isset($_POST['surname']))){
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $mail = $_POST['mail'];
                    $pass = $_POST['pass'];
                    $pass2 = $_POST['pass2'];

                    if ($pass == $pass2){
                        $pass = sha1($pass);

                        $usuario = new Usuarios();
            
                        if (!$usuario->getData('usuario', $mail)){
                            $usuario->insertUser($name,$surname,$mail,$pass);
                            $mensaje = '<h3 class="no_error">Usuario creado correctamente</h3>';
                            $name = '';
                            $surname = '';
                            $mail = '';
                        } else {
                            $mensaje = '<h3 class="error">El usuario ya existe</h3>';
                        }
                    } else {
                        $mensaje = '<h3 class="error">Las contraseñas introducidas no son la misma</h3>';
                    }
                }

                echo '<form action="" method="post"><div class="input"><label>E-mail</label>';
                echo '<input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="mail" value="'.$mail.'" required></div>';
                echo '<div class="input"><label>Contraseña</label><input type="password" name="pass" required></div>';
                echo '<div class="input"><label>Repetir contraseña</label><input type="password" name="pass2" required></div>';
                echo '<div class="input"><label>Nombre</label><input type="text" pattern="^[a-zA-Z]*$" name="name" value="'.$name.'" required></div>';
                echo '<div class="input"><label>Apellidos</label><input type="text" pattern="^[a-zA-Z]*$" name="surname" value="'.$surname.'" required>';
                echo '</div><div class="input"><input type="submit" value="REGISTRARSE"></div></form>';

                if (isset($mensaje)){
                    echo ($mensaje);
                }
            } else {
                echo '<h3>Debes cerrar sesión para acceder a esta página</h3>';
                echo '<a href="logout.php">Cerrar sesión</a><br>';
            }
        ?>

        <a href="index.php">Volver</a>

    </div>
</body>
</html>

