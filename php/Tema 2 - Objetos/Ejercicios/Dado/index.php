<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ejercicio Tema 2 (Coche) -  Miguel FGP</h1>

    <h3>Creamos una clase dado y realizamos 12 tiradas<h3>

    <?php 
    include 'dado.php';

    $dado = new Dado();

    
    for ($i = 0; $i < 12; $i++){
        echo $dado->tirarDado() . '<br>'; 
    }  
      
    
?>
</table>
</body>
</html>

