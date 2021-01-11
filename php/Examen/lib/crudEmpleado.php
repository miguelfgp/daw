<?php

require 'db.php';

    class CrudEmpleado extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $schema = 'empresa';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function selectEmpleados(){
            return parent::query('SELECT * FROM empleados');
        }

        function insertEmpleado($numero, $nombre, $puesto, $jefe, $fechaAlta, $salario, $comision, $dNumero){
            return parent::query('INSERT INTO empleados (numero, nombre, puesto, jefe, fechaalta, salario, comision, dnumero) VALUES ("'.$numero.'", "'.$nombre.'", 
            "'.$puesto.'", "'.$jefe.'", "'.$fechaAlta.'", "'.$salario.'",  "'.$comision.'",  "'.$dNumero.'")');
        }        

        function updateEmpleado($numero, $nombre, $puesto, $jefe, $fechaAlta, $salario, $comision, $dNumero){
            return parent::query('UPDATE empleados SET nombre = "'.$nombre.'", puesto = "'.$puesto.'", jefe = "'.$jefe.'", fechaalta = "'.$fechaAlta.'",
            salario = "'.$salario.'", comision = "'.$comision.'", dnumero = "'.$dNumero.'", WHERE (numero = "'.$numero.'")');
        }

        function deleteEmpleado($numero){
            return parent::query('DELETE FROM empleados WHERE (numero = "'.$numero.'")');
        }        
    }

?>