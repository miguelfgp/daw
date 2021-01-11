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
                $nombre = $_POST['nombre'];
                $puesto = $_POST['puesto'];
                $jefe = $_POST['jefe'];
                $fechaAlta = $_POST['fechaalta'];
                $salario = $_POST['salario'];
                $comision = $_POST['comision'];
                $dNumero = $_POST['dnumero'];

                $empleados = new CrudEmpleado();

                $empleados->updateEmpleado($numero, $nombre, $puesto, $jefe, $fechaAlta, $salario, $comision, $dNumero);

                echo '<h1>Empleado actualizado correctamente</h1>';
            }
        ?>
    </div>
</body>
</html>


