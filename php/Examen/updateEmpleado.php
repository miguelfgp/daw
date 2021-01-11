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

        <form action="update.php" method="post">
            <div>
                <label>Numero: </label>
                <input type="number" name="numero">
                <br><br>
            </div>
            <div>
                <label>Nombre: </label>
                <input type="text" name="nombre">
                <br><br>
            </div>
            <div>
                <label>Puesto: </label>
                <input type="text" name="puesto">
                <br><br>
            </div>
            <div>
                <label>Jefe: </label>
                <input type="number" name="jefe">
                <br><br>
            </div>
            <div>
                <label>Fecha Alta: </label>
                <input type="text" name="fechaalta">     
                <br><br>
            </div>
            <div>
                <label>Salario: </label>
                <input type="number" name="salario"> 
                <br><br>
            </div>
            <div>
                <label>Comisión: </label>
                <input type="number" name="comision">
                <br><br>
            </div>
            <div>
                <label>Numero Departamento: </label>
                <input type="number" name="dnumero">
                <br><br>
            </div>

            <div>
                <input type="submit" value="Actualizar">
            </div>
        </form>        
    </div>
</body>
</html>
