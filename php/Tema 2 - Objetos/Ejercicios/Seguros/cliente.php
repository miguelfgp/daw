<?php

    include 'indemnizado.php'; 
    
    class Cliente{
        private $dni;
        private $nombre;
        private $apellidos;

        function __construct($dni, $nombre, $apellidos){
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }

        function setDni($dni){
            $this->dni = $dni;
        }
        
        function getDni(){
            return $this->dni;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        
        function getNombre(){
            return $this->nombre;
        }
        
        function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        
        function getApellidos(){
            return $this->apellidos;
        }        


    }
?>