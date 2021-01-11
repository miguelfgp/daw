<?php

    // include 'otro.php';
    // require 'otro.php';

    // class Clase extends ClasePadre

    class Departamento{
        private $numero;
        private $nombre;
        private $ciudad;

        function __construct($numero, $nombre, $ciudad){
            $this->numero = $numero;
            $this->nombre = $nombre;
            $this->ciudad = $ciudad;
        }

        function getNumero(){
            return $this->numero;
        }

        function setNumero($numero){
            $this->numero = $numero;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        
        function getCiudad(){
            return $this->ciudad;
        }

        function setCiudad($ciudad){
            $this->ciudad = $ciudad;
        }        

    }
?>