<?php

    include 'jugador.php';

    class Equipo{
        private $jugadores;

        function __construct(){
        }

        function addJug($jugador){
            $this->jugadores[] = $jugador;
        }

        function getJug($numJugador){
            return $this->jugadores[$numJugador];
        }

        function getJugadores(){
            return $this->jugadores;
        }        

        function getTotal(){

            $total = 0;

            for ($i = 0; $i < count($this->jugadores); $i++){
                $total += $this->jugadores[$i]->getPtos();
            }

            return $total;
            
        }


    }
?>