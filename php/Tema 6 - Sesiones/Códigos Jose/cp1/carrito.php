<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DWES</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
    <h2>DESARROLLO WEB ENTORNO SERVIDOR - Caso Práctico 1 - Unidad 6 - Carrito de compra</h2>
    <a href="index.php"><b>Inicio</b></a></br></br>
      <fieldset>
        <legend><b>Listado de productos y unidades</b></legend>
        <table class="w3-table w3-bordered">
          <tr><th>Producto</th><th>Número de productos</th></tr>
        <?php

          if($_COOKIE["producto1"] >0){
            echo "<tr><td>Producto 1</td><td>".$_COOKIE["producto1"]."</td></tr>";
          }
          if($_COOKIE["producto2"] >0){
            echo "<tr><td>Producto 2</td><td>".$_COOKIE["producto2"]."</td></tr>";
          }
          if($_COOKIE["producto3"] >0){
            echo "<tr><td>Producto 3</td><td>".$_COOKIE["producto3"]."</td></tr>";
          }
          if($_COOKIE["producto4"] >0){
            echo "<tr><td>Producto 4</td><td>".$_COOKIE["producto4"]."</td></tr>";
          }
        ?>
        </table>
      </fieldset>
    <footer>
      <h6>Asignatura: Desarrollo Web Entorno Servidor</h6>
    </footer>
  </body>
</html>
