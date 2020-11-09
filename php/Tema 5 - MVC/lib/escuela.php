<?php

    class Escuela{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $schema = 'escuela';
        private $port = 3306;
        private $connect;
        private $query;

        function __construct(){
            $this->connect = new mysqli('localhost', 'root', '', 'escuela', 3306);
        }

        function makeQuery($query){
            $this->query = $this->connect->query($query);
    
            return $this->query;
        }
                
        function verAlumnos(){
            $this->query = $this->connect->query('SELECT * FROM alumnos');

            return $this->query;
        }

        function insertarAlumno($nombre, $apellidos, $edad=18){
            $this->connect->query('INSERT INTO alumnos(nombre, apellidos, edad) VALUES ("'.$nombre.'", "'.$apellidos.'", ".$edad.")');
        }    

    }

?>