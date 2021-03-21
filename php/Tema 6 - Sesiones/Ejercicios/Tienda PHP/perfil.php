<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>

    <div id="center">

        <h1>Mi tienda en PHP -  Miguel FGP</h1>
        <h3>Mi perfil</h3>
            
        <?php

            require 'classes/seguridad.php';
            require 'classes/usuarios.php';

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            if (!isset($user)){
                header('Location: ./index.php');
            }

            $usuario = new Usuarios();

            $name = $usuario->getData('nombre', $user);
            $surname = $usuario->getData('apellidos', $user);
            $role = $usuario->getData('rol', $user);

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

        <a href="logout.php">Cerrar sesión</a><br>
        <a href="index.php">Volver</a>

    </div>
</body>
</html>

