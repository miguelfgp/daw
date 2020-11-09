<?php

    class Escuela{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'escuela';
        private $port = 3306;
        private $connect;
        private $query;

        function __construct(){
            $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function makeQuery($query){
            $this->query = $this->connect->query($query);
        }

        function select($query){
            $array = [];
            $this->makeQuery($query);

            while ($result = $this->query->fetch_assoc()){
                $array[] = $result;
            }

            //var_dump($array);

            return $array;
            
        }

        function insert($query){
            $this->makeQuery($query);
        }
      
        /*
        function verAlumnos(){
            $this->query = $this->connect->query('SELECT * FROM alumnos');

            return $this->query;
        }

        function insertarAlumno($nombre, $apellidos, $edad=18){
            $this->connect->query("INSERT INTO alumnos(nombre, apellidos, edad) VALUES ('".$nombre."', '".$apellidos."', ".$edad.")");
        }    
        */

    }

?>