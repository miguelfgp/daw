<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">
        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>

        <h3 id="title">Super Smash Bros. Melee</h3>

        <img src="img/ssbm.png" alt="Super Smash Bros. Melee">

        <form action="add.php" method="post">
            <input type="hidden" name="game" value="ssbm">
            <input type="hidden" name="title" value="Super Smash Bros. Melee">
            <input type="hidden" name="img" value="img/ssbm.png">
            <input type="number" name="qt" min="1" required>
            <input type="submit" value="Enviar">
        </form>
        
        <a href="index.php">Volver</a>
    </div>
</body>
</html>

