<?php
    
    Class DosRuedas extends Vehiculo{

        private $cilindrada;

        function __construct($color, $peso, $cilindrada){
            parent::__construct($color, $peso);
            $this->cilindrada = $cilindrada;
        }

        function setCilindrada($cilindrada){
            $this->cilindrada = $cilindrada;
        }

        function getCilindrada(){
            return $this->cilindrada;
        }           

        function ponerGasolina($litros){
            $this->peso += $litros;
        }   

    }
?>