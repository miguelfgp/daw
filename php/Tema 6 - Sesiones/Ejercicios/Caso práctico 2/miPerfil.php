<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">

        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>
        <h3>Mi perfil</h3>
            
        <?php

            require 'seguridad.php';
            require 'usuarios.php';

            //session_start();

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            //if (!isset($_SESSION['user'])){
            if (!isset($user)){
                header('Location: ./index.php');
            }

            $usuarios = new Usuarios();

            $name = $usuarios->getUserName($user);
            $surname = $usuarios->getUserSurname($user);

            echo '<form action="" method="post"><div class="input"><label>E-Mail</label>';
            echo '<input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="mail" value="'.$user.'" readonly>';
            echo '</div> <div class="input"><label>Nombre</label>';
            echo '<input type="text" pattern="^[a-zA-Z]*$" name="name" value="'.$name.'"required>';
            echo '</div><div class="input"><label>Apellidos</label>';
            echo '<input type="text" pattern="^[a-zA-Z]*$" name="surname" value="'.$surname.'"required>';
            echo '</div><div class="input"><input type="submit" value="Actualizar"></div></form>';

            if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['surname']) && !empty($_POST['surname'])){
                $newName = $_POST['name'];
                $newSurname = $_POST['surname'];

                $usuarios->updateUser($user, $newName, $newSurname);

                echo 'UPDATE usuarios SET nombre = "'.$newName.'", apellidos = "'.$newSurname.'" WHERE (usuario = "'.$user.'")';

                header('Location: ./');
            }
        ?>

        <form action="index.php" id="close_session" method="post">
            <input type="hidden" name="close" value="true">
            <a href="javascript:{}" onclick="document.getElementById('close_session').submit(); return false;">Cerrar sesión</a>
        </form>
    </div>
</body>
</html>

