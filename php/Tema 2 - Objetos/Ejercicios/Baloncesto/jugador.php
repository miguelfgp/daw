<?php

    class Jugador{
        private $numeroJug;
        private $ptos;

        function __construct($numeroJug){
            $this->numeroJug = $numeroJug;
        }

        function getNumJug(){
            return $this->numeroJug;
        }

        function getPtos(){
            return $this->ptos;
        }

        function addPtos($ptos){
            $this->ptos = $ptos;
        }
    }
?>