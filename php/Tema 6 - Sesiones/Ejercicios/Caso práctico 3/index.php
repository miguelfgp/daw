<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">
        
        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>
        <h3>Login</h3>

        <?php
            require 'usuarios.php';
            require 'seguridad.php';

            $seguridad = new Seguridad();
            
            if (isset($_POST['close'])){
                $_SESSION['user'] = null;
                $seguridad->unsetUser();
            }
            
            $user = $seguridad->getUser();

            if (isset($user) && !empty($user)){
                header('Location: ./miPerfil.php');
            }

            $user = '';
            $pass = '';
            $mensaje = '';

            if ((isset($_POST['user'])) && (isset($_POST['pass']))){
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $usuarios = new Usuarios();

                if ($usuarios->getData('usuario', $user)){
        
                    $pass = sha1($pass); 
                    $savedPass = $usuarios->getData('pass', $user);
                    
        
                    if ($pass == $savedPass){
                        $_SESSION['user'] = $user;
                        header('Location: ./miPerfil.php');
                    } else {
                        $mensaje = '<h3 class="error">Contraseña incorrecta</h3>';
                    }
                } else {
                    $mensaje = '<h3 class="error">El usuario no existe</h3>';
                }
            }

            echo '<form action="" method="post"><div class="input"><label>Usuario</label>';
            echo '<input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="user" value="'.$user.'" required></div>';
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

