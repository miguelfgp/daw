<?php

    include 'jugador.php';

    class Equipo{
        private $jugadores;

        function __construct(){
        }

        function addJug($jugadores){
            $this->jugadores = $jugadores;
        }

        function getJug($numJugador){
            return $this->jugadores[$numJugador];
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