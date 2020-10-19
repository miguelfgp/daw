<?php
    class Equipo{
        private $nombre;
        public $posicion;

        function __construct(){
            $this->nombre = "Equipo sin nombre";
            $this->posicion = 0;
        }

        function mostrarEquipo(){
            echo $this->nombre;
        }

        function ponerEquipo($nombre){
            $this->nombre = $nombre;
        }

        function setPosicion($posicion){
            $this->posicion = $posicion;
        }

        function getPosicion(){
            return $this->posicion;
        }
    }
?>