<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">
        <?php
            
            $games = ['ssbm', 'ssbb', 'ssbw', 'ssbu'];

            if (isset($_COOKIE) && !empty($_COOKIE)){

                echo '<table style="border:1px solid black"><tr><th colspan=4>CARRITO</th></tr>';

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

                echo '</table>';
            } else {
                echo '<h3>El carrito está vacío!</h3>';
            }

            echo '<br><a href="index.php">Volver</a>';
        ?>
    </div>
</body>
</html>