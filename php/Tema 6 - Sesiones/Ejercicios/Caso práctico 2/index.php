<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">
        
        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>
        <h3>Login</h3>
           
        <form action="" method="post">
            <div class="input">
                <label>Usuario</label>
                <input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="user" required>
            </div>
            <div class="input">
                <label>Contraseña</label>
                <input type="password" name="pass" required>
            </div>
            <div class="input">
                <input type="submit" value="ENTRAR">
            </div>
        </form>

        <a href="registro.php">Registrarse</a>

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

            $mensaje = '';

            if ((isset($_POST['user'])) && (isset($_POST['pass']))){
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $usuarios = new Usuarios();

                if ($usuarios->searchUser($user)){
        
                    $pass = sha1($pass); 
                    $savedPass = $usuarios->getUserPass($user);
                    
        
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

            if (isset($mensaje)){
                echo ($mensaje);
            }
        ?>
    </div>
</body>
</html>

