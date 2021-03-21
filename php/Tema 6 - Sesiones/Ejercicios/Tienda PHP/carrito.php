<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">

        <h1>Mi tienda en PHP -  Miguel FGP</h1>

        <?php
            
            require 'classes/seguridad.php';
            require 'classes/usuarios.php';

            $seguridad = new Seguridad();
            $user = $seguridad->getUser();

            if (isset($user)){
                $data = null;
                $games = ['ssbm', 'ssbb', 'ssbw', 'ssbu'];

                echo '<table style="border:1px solid black"><tr><th colspan=4>CARRITO</th></tr>';

                if (isset($_COOKIE) && !empty($_COOKIE)){

                    foreach ($games as $game){
                        if (isset($_COOKIE[$game])){
                            
                            $data = unserialize($_COOKIE[$game]);

                            echo '<tr>';
                            echo '<td><img src="'.$data['img'].'"></td>';
                            echo '<td><b>' . $data['title'] . '</b></td>';
                            echo '<td>'. $data['qt'] . '</td>';
                            echo '<td><form action="delete.php" method="post"><input type="hidden" name="game" value="'.$game.'"><input type="submit" value="Borrar"></form></td>';
                            echo '</tr>';
                        }
                    }

                    if (!$data){
                        echo '<tr><td><h3>¡El carrito está vacío!</h3></td></tr></table>';
                    }
                } else {
                    echo '<tr><td><h3>¡El carrito está vacío!</h3></td></tr></table>';
                }

                echo '</table>';
            } else {
                header('Location: ./error.php');
            }

            echo '<br><a href="index.php">Volver</a>';
        ?>
    </div>
</body>
</html>