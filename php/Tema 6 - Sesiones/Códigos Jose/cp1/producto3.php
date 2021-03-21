<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DWES</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h2>DESARROLLO WEB ENTORNO SERVIDOR - Tarea 2 - Unidad 6 - Todos los nombres</h2>
  <a href="index.php"><b>Inicio</b></a>
  <a href="carrito.php"><b>Ver Carrito</b></a></br></br>
  <fieldset>
    <legend>Especifique el número de productos del producto <b>PRODUCTO 3</b></legend>
    <form method="post" action="procesar_carrito.php">
      <!--Establecemos un campo oculto para pasar el producto1-->
      <input type="hidden" id="producto3" name="producto3" value="producto3">
      <label>Número de productos:</label><br>
      <input type="number" id="numero3" name="numero3" required>
      <br><br>
    <input type="submit" class="w3-button w3-black" value="Añadir al carrito">
  </form></br>
</fieldset></br>
  <footer>
    <h6>Asignatura: Desarrollo Web Entorno Servidor</h6>
  </footer>
  </body>
</html>
