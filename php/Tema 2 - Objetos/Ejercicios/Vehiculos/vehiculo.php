<?php

    include 'cuatro_ruedas.php';
    include 'dos_ruedas.php';

    Class Vehiculo{

        private $color;
        private $peso;

        function __construct($color, $peso){
            $this->color = $color;
            $this->peso = $peso;
        }

        function setColor($color){
            $this->color = $color;
        }

        function getColor(){
            return $this->color;
        }

        function setPeso($peso){
            $this->peso = $peso;
        }   

        function getPeso(){
            return $this->peso;
        }

        function circula(){
            return 'El vehículo circula';
        }

        function añadirPersona($pesoPersona){
            $this->peso += $pesoPersona;
        }

    }
?>