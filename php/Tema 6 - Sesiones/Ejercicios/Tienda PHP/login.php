<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">
        
        <h1>Mi tienda en PHP -  Miguel FGP</h1>
        <h3>Login</h3>

        <?php
            require 'classes/usuarios.php';
            require 'classes/seguridad.php';

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            if (isset($user) && !empty($user)){
                header('Location: ./perfil.php');
            }

            $name = '';
            $pass = '';
            $mensaje = '';

            if ((isset($_POST['user'])) && (isset($_POST['pass']))){
                $name = $_POST['user'];
                $pass = $_POST['pass'];

                $usuario = new Usuarios();

                if ($usuario->getData('usuario', $name)){
        
                    $pass = sha1($pass); 
                    $savedPass = $usuario->getData('pass', $name);
                    
        
                    if ($pass == $savedPass){
                        $_SESSION['user'] = $name;
                        header('Location: ./perfil.php');
                    } else {
                        $mensaje = '<h3 class="error">Contraseña incorrecta</h3>';
                    }
                } else {
                    $mensaje = '<h3 class="error">El usuario no existe</h3>';
                }
            }

            echo '<form action="" method="post"><div class="input"><label>Usuario</label>';
            echo '<input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="user" value="'.$name.'" required></div>';
            echo '<div class="input"><label>Contraseña</label><input type="password" name="pass" required></div>';
            echo '<div class="input"><input type="submit" value="ENTRAR"></div></form>';

            if (isset($mensaje)){
                echo ($mensaje);
            }
        ?>

        <a href="registro.php">Registrarse</a>

    </div>
</body>
</html>

