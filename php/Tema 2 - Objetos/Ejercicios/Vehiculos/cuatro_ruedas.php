<?php

    include 'coche.php';
    include 'camion.php';
    
    Class CuatroRuedas extends Vehiculo{

        private $numPuertas;

        function __construct($color, $peso, $numPuertas){
            parent::__construct($color, $peso);
            $this->numPuertas = $numPuertas;
        }

        function setNumPuertas($numPuertas){
            $this->numPuertas = $numPuertas;
        }

        function getNumPuertas(){
            return $this->numPuertas;
        }        

        function repintar($color){
            $this->color = $color;
        }   

    }
?>