<?php
    
    Class Coche extends CuatroRuedas{

        private $numCadenasNieve;

        function __construct($color, $peso, $numPuertas, $numCadenasNieve){
            parent::__construct($color, $peso, $numPuertas);
            $this->numCadenasNieve = $numCadenasNieve;
        }

        function setNumCadenasNieve($numCadenasNieve){
            $this->numCadenasNieve = $numCadenasNieve;
        }

        function getNumCadenasNieve(){
            return $this->numCadenasNieve;
        }        

        function añadirCadenasNieve($num){
            $this->numCadenasNieve += $num;
        }

        function quitarCadenasNieve($num){
            $this->numCadenasNieve -= $num;
        }           

    }
?>