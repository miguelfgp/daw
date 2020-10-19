<?php
    class Coche{
        private $tipoCombustible;
        private $combustible;
        private $velocidad;
        private $combustibleMaximo;
        private $litrosReserva;
        private $parado;

        function __construct(){
            $tipoCombustible = 'Diesel';
            $combustible = 0;
            $velocidad = 0;
            $combustibleMaximo = 0;
            $litrosReserva = 0;
            $parado = true;
        }

        function setTipoCombustible($tipoCombustible){
            $this->tipoCombustible = $tipoCombustible;
        }
        
        function getTipoCombustible(){
            return $this->tipoCombustible;
        }
        /*
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
        
        function setParado(){
            return $this->parado;
        }

        function getParado($parado){
            $this->parado = $parado;
        }        

        function estaParado(){
            if ($this->getVelocidad() <= 0){
                $this->parado = true;
            } else {
                $this->parado = false;
            }
        }
        
        function estadoCoche(){
            if ($this->estaParado()){
                $mensaje = 'El coche está parado';
            } else {
                $mensaje = 'El coche está en movimiento';
            }
            return $mensaje;
        }

        function estaEnReserva(){
            if ($this->cantidadCombustible <= $this->capacidadReserva){
                return true;
            } else {
                return false;
            }
        }

        function acelerar($velocidadAceleracion){
            if($this->parado){
                $mensaje = "El coche no puede acelerar porque está parado";                
            } else {
                $this->velocidad += $velocidadAceleracion;
                $mensaje = "El coche ha acelerado hasta los " . $this->velocidad . "Km/h";
            }

            return $mensaje;
        }

        function frenar($velocidadFrenado){
            if($this->parado){
                $mensaje = "El coche no puede frenar porque está parado";
            } else {
                $this->velocidad -= $velocidadFrenado;
                $mensaje = "El coche ha frenado hasta los " . $this->velocidad . "Km/h";
            }

            return $mensaje;
        }
        
        function repostar($cantidad, $tipoCombustible){

            if ($this->tipoCombustible === $tipoCombustible){
                if($this->parado){
                    $this->combustible += $cantidad;
                    $mensaje = "El coche ha repostado " . $cantidad . " litros de " . $tipoCombustible;

                } else {
                    $mensaje = "El coche no puede repostar porque está en movimiento";
                }
            } else {
                $mensaje = "El tipo de combustible no es compatible con el vehículo";
            }

            return $mensaje;
        }           
        */
             
    }
?>