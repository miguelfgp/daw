<?php

    require 'escuela.php';

    class Alumnos extends Escuela{
    
        function __construct(){
            parent::__construct();
        }

        function verAlumnos(){
            return parent::select('SELECT * FROM alumnos');
        }

        function añadirAlumno($nombre, $apellidos, $edad=18){
            parent::insert("INSERT INTO alumnos(nombre, apellidos, edad) VALUES ('".$nombre."', '".$apellidos."', ".$edad.")");
        }   
    }

?>