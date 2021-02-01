<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">
        <?php

            if(isset($_POST['game']) && !empty($_POST['game'])){

                $game = $_POST['game'];

                if(isset($_COOKIE[$game]) && !empty($_COOKIE[$game])){
                    setcookie($game, '', time()-1000);
                }
            }

            echo '<h3>Producto eliminado de la cesta satisfactoriamente</h3>';
            echo '<a href="index.php">Volver</a><br>';
            echo '<a href="carrito.php">Ver carrito</a>';
        ?>
    </div>
</body>
</html>