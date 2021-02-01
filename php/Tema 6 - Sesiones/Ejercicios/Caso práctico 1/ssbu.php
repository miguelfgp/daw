<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="center">
        <h1>Ejercicio Tema 6 (Sesión) -  Miguel FGP</h1>

        <h3 id="title">Super Smash Bros. Ultimate</h3>

        <img src="img/ssbu.png" alt="Super Smash Bros. Ultimate">

        <form action="add.php" method="post">
            <input type="hidden" name="game" value="ssbu">
            <input type="hidden" name="title" value="Super Smash Bros. Ultimate">
            <input type="hidden" name="img" value="img/ssbu.png">
            <input type="number" name="qt" min="1" required>
            <input type="submit" value="Enviar">
        </form>

        <a href="index.php">Volver</a>
    </div>
</body>
</html>

