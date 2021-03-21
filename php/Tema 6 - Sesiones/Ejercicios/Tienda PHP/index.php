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
                $usuario = new Usuarios();
                $name = $usuario->getData('nombre', $user);

                echo '<h3>¡Bienvenido '.$name.'!</h3>';
            } else {
                echo '<h3>¡Bienvenido invitado!</h3>';
            }
        ?>
        

        <div id="catalogue">
            <div class="game">
                <img src="img/ssbb.png" alt="Super Smash Bros. Brawl">

                <form action="add.php" method="post">
                    <input type="hidden" name="game" value="ssbb">
                    <input type="hidden" name="title" value="Super Smash Bros. Brawl">
                    <input type="hidden" name="img" value="img/ssbb.png">
                    <input type="number" name="qt" min="1" required>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <div class="game">
                <img src="img/ssbm.png" alt="Super Smash Bros. Melee">

                <form action="add.php" method="post">
                    <input type="hidden" name="game" value="ssbm">
                    <input type="hidden" name="title" value="Super Smash Bros. Melee">
                    <input type="hidden" name="img" value="img/ssbm.png">
                    <input type="number" name="qt" min="1" required>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <div class="game">
                <img src="img/ssbw.png" alt="Super Smash Bros. for Wii U">

                <form action="add.php" method="post">
                    <input type="hidden" name="game" value="ssbw">
                    <input type="hidden" name="title" value="Super Smash Bros. for Wii U">
                    <input type="hidden" name="img" value="img/ssbw.png">
                    <input type="number" name="qt" min="1" required>
                    <input type="submit" value="Enviar">
                </form>
            </div>   
            <div class="game">
                <img src="img/ssbu.png" alt="Super Smash Bros. Ultimate">

                <form action="add.php" method="post">
                    <input type="hidden" name="game" value="ssbu">
                    <input type="hidden" name="title" value="Super Smash Bros. Ultimate">
                    <input type="hidden" name="img" value="img/ssbu.png">
                    <input type="number" name="qt" min="1" required>
                    <input type="submit" value="Enviar">
                </form>       
            </div>     
        </div>

        <?php
            if (isset($user)){
                echo '<a href="carrito.php">Ver carrito</a><br>';
                echo '<a href="logout.php">Cerrar sesión</a><br>';
            } else {
                echo '<a href="login.php">Accede a tu cuenta</a><br>';
                echo '<a href="registro.php">Crear una cuenta</a><br>';
            }
        ?>
    </div>
</body>
</html>

