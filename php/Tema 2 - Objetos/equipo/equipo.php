<?php
    class Equipo{
        private $nombre;
        public $posicion;

        function mostrarEquipo(){
            echo $this->nombre;
        }

        function ponerEquipo($nombre){
            $this->nombre = $nombre;
        }        
    }
?>