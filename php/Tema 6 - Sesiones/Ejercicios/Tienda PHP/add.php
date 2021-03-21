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
                //header('Location: ./index.php');
                if(isset($_POST['game']) && !empty($_POST['game'])
                && (isset($_POST['qt']) && !empty($_POST['qt']))
                && (isset($_POST['img']) && !empty($_POST['img']))
                && (isset($_POST['title']) && !empty($_POST['title']))){

                    $game = $_POST['game'];
                    $title = $_POST['title'];
                    $qt = $_POST['qt'];
                    $img = $_POST['img'];

                    if(!isset($_COOKIE[$game]) || empty($_COOKIE[$game])){

                        $data = [
                            'title' => $title,
                            'qt' => $qt,
                            'img' => $img,
                        ];

                        setcookie($game, serialize($data), time()+86400);
                    } else {
                        $data = unserialize($_COOKIE[$game]);
                        
                        $data['qt'] = $data['qt'] + $qt;

                        setcookie($game, serialize($data));
                    }
                }
                header('Location: ./carrito.php');

                var_dump($_COOKIE);
            } else {
                header('Location: ./error.php');
            }
        ?>
    </div>
</body>
</html>