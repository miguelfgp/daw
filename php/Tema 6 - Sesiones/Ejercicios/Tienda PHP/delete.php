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
                if(isset($_POST['game']) && !empty($_POST['game'])){

                    $game = $_POST['game'];

                    if(isset($_COOKIE[$game]) && !empty($_COOKIE[$game])){
                        setcookie($game, '', time()-1000);
                    }
                }

                header('Location: carrito.php');
            } else {
                header('Location: error.php');
            }
        ?>
    </div>
</body>
</html>