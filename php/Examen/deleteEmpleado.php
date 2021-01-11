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
        
            require('lib/crudEmpleado.php');

            $empleados = new CrudEmpleado();

            $array = $empleados->selectEmpleados();

            echo '<form action="delete.php" method="post"><table><tr><th>Numero</th><th>Nombre</th><th>Puesto</th><th>Jefe</th><th>Fecha Alta</th><th>Salario</th><th>Comisión</th><th>Nº Departamento</th>';
            foreach ($array as $empleado){
                echo '<tr>';
                echo '<td>'.$empleado['numero'].'</td>';
                echo '<td>'.$empleado['nombre'].'</td>';
                echo '<td>'.$empleado['puesto'].'</td>';
                echo '<td>'.$empleado['jefe'].'</td>';
                echo '<td>'.$empleado['fechaalta'].'</td>';
                echo '<td>'.$empleado['salario'].'</td>';
                echo '<td>'.$empleado['comision'].'</td>';
                echo '<td>'.$empleado['dnumero'].'</td>';
                echo '<td><input type="hidden" name="numero" value="'.$empleado['numero'].'"><input type="submit" value="Eliminar"></td>';
                echo '</tr>';
            }

            echo '</table></form>';
            
        ?>
    </div>
</body>
</html>
