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

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            if (!isset($user)){
                header('Location: ./index.php');
            }

            $usuarios = new Usuarios();

            $name = $usuarios->getData('nombre', $user);
            $surname = $usuarios->getData('apellidos', $user);
            $role = $usuarios->getData('rol', $user);

            echo '<h3>¡Bienvenido '.$name.'!</h3>';

            echo '<form action="" method="post"><div class="input"><label>E-Mail</label>';
            echo '<input type="text" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" name="mail" value="'.$user.'" readonly></div>';
            echo '<div class="input"><label>Nombre</label>';
            echo '<input type="text" pattern="^[a-zA-Z]*$" name="name" value="'.$name.'"required></div>';
            echo '<div class="input"><label>Apellidos</label>';
            echo '<input type="text" pattern="^[a-zA-Z]*$" name="surname" value="'.$surname.'"required></div>';
            echo '<div class="input"><select name="role"><option>User</option><option ';
            if ($role == 'Admin'){
                echo 'selected';
            }
            echo '>Admin</option></select></div>';
            echo '<div class="input"><input type="submit" value="Actualizar"></div></form>';

            if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['surname']) && !empty($_POST['surname']) && isset($_POST['role']) && !empty($_POST['role'])){
                $newName = $_POST['name'];
                $newSurname = $_POST['surname'];
                $newRole = $_POST['role'];

                $var = $usuarios->updateUser($user, $newName, $newSurname, $newRole);

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

