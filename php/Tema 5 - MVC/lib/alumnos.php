<?php

    require 'escuela.php';

    class Alumno extends Escuela{
    
        function __construct(){
            parent::__construct();
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