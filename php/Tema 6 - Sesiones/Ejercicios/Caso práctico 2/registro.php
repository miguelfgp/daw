<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">

        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>
        <h3>Registro</h3>
        
        <form action="" method="post">
            <div class="input">
                <label>E-mail</label>
                <input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="mail" required>
            </div>
            <div class="input">
                <label>Contraseña</label>
                <input type="password" name="pass" required>
            </div>
            <div class="input">
                <label>Repetir contraseña</label>
                <input type="password" name="pass2" required>
            </div>
            <div class="input">
                <label>Nombre</label>
                <input type="text" pattern="^[a-zA-Z]*$" name="name" required>
            </div>
            <div class="input">
                <label>Apellidos</label>
                <input type="text" pattern="^[a-zA-Z]*$" name="surname" required>
            </div>
            <div class="input">
                <input type="submit" value="REGISTRARSE">
            </div>
        </form>

        <a href="index.php">Volver</a>

        <?php

            require 'usuarios.php';
            $mensaje = '';

            if ((isset($_POST['mail'])) && (isset($_POST['pass'])) && (isset($_POST['pass2'])) && (isset($_POST['name'])) && (isset($_POST['surname']))){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $mail = $_POST['mail'];
                $pass = $_POST['pass'];
                $pass2 = $_POST['pass2'];

                if ($pass == $pass2){
                    $pass = sha1($pass);

                    $usuarios = new Usuarios();
        
                    if (!$usuarios->searchUser($mail)){
                        $usuarios->insertUser($name,$surname,$mail,$pass);
                        $mensaje = '<h3 class="no_error">Usuario creado correctamente</h3>';
                    } else {
                        $mensaje = '<h3 class="error">El usuario ya existe</h3>';
                    }
                } else {
                    $mensaje = '<h3 class="error">Las contraseñas introducidas no son la misma</h3>';
                }
            }

            if (isset($mensaje)){
                echo ($mensaje);
            }
        ?>
    </div>
</body>
</html>

