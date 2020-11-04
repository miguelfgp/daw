<?php
    
    Class Camion extends CuatroRuedas{

        private $longitud;

        function __construct($color, $peso, $numeroPuertas, $longitud){
            parent::__construct($color, $peso, $numPuertas);
            $this->longitud = $longitud;
            
        }

        function setLongitud($longitud){
            $this->longitud = $longitud;
        }

        function getLongitud(){
            return $this->longitud;
        }        

        function añadirRemolque($longitudRemolque){
            $this->longitud += $longitudRemolque;
        }   

    }
?>