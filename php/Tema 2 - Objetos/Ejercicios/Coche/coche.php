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

        // Todos los Getter y Setter de cada atributo

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
        
        // Función que determina si el vehículo está parado o no según el atributo $velocidad
        
        function estaParado(){
            
            $parado = true;

            if ($this->velocidad > 0){
                $parado = false;
            } 

            return $parado;
        }

        /* 
        Función que determina si el vehículo está en reserva o no comparando los atributos
        $combustible y $litrosReserva
        */

        function estaEnReserva(){

            $reserva = true;

            if ($this->getCombustible() > $this->getLitrosReserva()){
                $reserva = false;
            }
            
            return $reserva;
        }

        /*
        Función que devuelve un mensaje especificando si el vehículo está en movimiento,
        parado o en reserva
        */
        
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

        // Función que aumenta la velocidad del coche y devuelve un mensaje

        function acelerar($velocidadAceleracion){
            $this->velocidad += $velocidadAceleracion;
            return "El coche ha acelerado hasta los " . $this->velocidad . " km/h";
        }

        /* 
        Función que frena la velocidad del coche y devuelve un mensaje. Si la
        velocidad final resulta negativa, la convierte en 0
        */

        function frenar($velocidadFrenado){
            $this->velocidad -= $velocidadFrenado;
            if ($this->velocidad < 0){
                $this->velocidad = 0;
            }
            return "El coche ha frenado hasta los " . $this->velocidad . " km/h";
        }
        
        /*
        Función que aumenta la cantidad de combustible del vehículo y devuelve un
        mensaje. Previamente realiza las siguientes verificaciones:
            - Que el tipo de combustible coincida con el del vehículo.
            - Que el vehículo no esté en movimiento.
            - Que la cantidad de combustible no exceda el total del depósito. En ese
              caso, el vehículo solo reposta la cantidad necesaria de combustible.
        */

        function repostar($cantidadCombustible, $tipoCombustible){

            $mensaje = "El coche no puede repostar porque está en movimiento";

            if ($this->tipoCombustible == $tipoCombustible){
                if($this->estaParado()){

                    if(($this->combustible + $cantidadCombustible) > $this->combustibleMaximo){
                        $cantidadCombustible -= $this->combustible + $cantidadCombustible - $this->combustibleMaximo;
                        $this->combustible = $this->combustibleMaximo;
                    } else {
                        $this->combustible += $cantidadCombustible;
                    }

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