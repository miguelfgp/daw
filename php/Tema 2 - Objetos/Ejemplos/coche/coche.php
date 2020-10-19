<?php
    class Coche{
        private $color='Azul';
        private $tipo='Turismo';

        public function mostrarColor(){
            echo 'El color del coche es ';
            echo $this->color;
            echo '<br>';
        }

        public function getColor(){
            return $this->color;
        }

        public function mostrarTipo(){
            echo $this->tipo;
            echo '<br>';
        }        
    }
?>