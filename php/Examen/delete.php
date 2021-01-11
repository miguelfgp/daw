<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <div id="main">
        <h1>Práctica examen -  Miguel FGP</h1>

        <h3>Elige una opción</h3>

        <nav>
            <ul>
                <li><a href="createEmpleado.php">Crear Empleado</a></li>
                <li><a href="updateEmpleado.php">Actualizar Empleado</a></li>
                <li><a href="deleteEmpleado.php">Eliminar Empleado</a></li>
            </ul>
        </nav>

        <?php
            require 'lib/crudEmpleado.php';

            if(isset($_POST) && !empty($_POST)){
                $numero = $_POST['numero'];

                $empleados = new CrudEmpleado();

                $empleados->deleteEmpleado($numero);

                echo '<h1>Empleado eliminado correctamente</h1>';
            }
        ?>
    </div>
</body>
</html>


