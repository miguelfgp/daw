<?php
    class Coche{
        private $tipoCombustible;
        private $combustible;
        private $velocidad;
        private $combustibleMaximo;
        private $litrosReserva;

        /*
        El constructor inicializa la cantidad de combustible y la velocidad a 0, 
        mientras que el tipo de combustible, el combustible máximo y los litros
        para la reserva son inicializados a través de parámetros.
        */

        function __construct($tipoCombustible, $combustibleMaximo, $litrosReserva){
            $this->tipoCombustible = $tipoCombustible;
            $this->combustible = 0;
            $this->velocidad = 0;
            $this->combustibleMaximo = $combustibleMaximo;
            $this->litrosReserva = $litrosReserva;
        }     

        function setTipoCombustible($tipoCombustible){
            $this->tipoCombustible = $tipoCombustible;
        }
        
        function getTipoCombustible(){
            return $this->tipoCombustible;
        }
        
        function setCombustible($combustible){
            $this->combustible = $combustible;
        }
        
        function getCombustible(){
            return $this->combustible;
        }

        function setVelocidad($velocidad){
            $this->velocidad = $velocidad;
        }
        
        function getVelocidad(){
            return $this->velocidad;
        }
        
        function setCombustibleMaximo($combustibleMaximo){
            $this->combustibleMaximo = $combustibleMaximo;
        }
        
        function getCombustibleMaximo(){
            return $this->combustibleMaximo;
        }
        
        function setLitrosReserva($litrosReserva){
            $this->litrosReserva = $litrosReserva;
        }
        
        function getLitrosReserva(){
            return $this->litrosReserva;
        }   
        
        function estaParado(){
            
            $parado = true;

            if ($this->velocidad > 0){
                $parado = false;
            } 

            return $parado;
        }

        function estaEnReserva(){

            $reserva = true;

            if ($this->getCombustible() > $this->getLitrosReserva()){
                $reserva = false;
            }
            
            return $reserva;
        }
        
        function estadoCoche(){

            $mensaje = 'El coche está en movimiento';

            if ($this->estaParado()){
                $mensaje = 'El coche está parado';
            }

            if($this->estaEnReserva()){
                $mensaje .= ' y está en reserva';
            }
            
            return $mensaje;
        }

        function acelerar($velocidadAceleracion){
            $this->velocidad += $velocidadAceleracion;
            return "El coche ha acelerado hasta los " . $this->velocidad . " km/h";
        }

        function frenar($velocidadFrenado){
            $this->velocidad -= $velocidadFrenado;
            return "El coche ha frenado hasta los " . $this->velocidad . " km/h";
        }
        
        function repostar($cantidadCombustible, $tipoCombustible){

            $mensaje = "El coche no puede repostar porque está en movimiento";

            if ($this->tipoCombustible === $tipoCombustible){
                if($this->estaParado()){
                    $this->combustible += $cantidadCombustible;
                    $mensaje = "El coche ha repostado " . $cantidadCombustible . " litros de " . $tipoCombustible;
                }
            } else {
                $mensaje = "El tipo de combustible no es compatible con el vehículo";
            }

            return $mensaje;
        }           
        
             
    }
?>