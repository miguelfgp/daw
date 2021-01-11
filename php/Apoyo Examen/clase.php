<?php

    // include 'otro.php';
    // require 'otro.php';

    // class Clase extends ClasePadre

    class Clase{
        private $a;

        function __construct(){
        }

        function get(){
            return $this->a;
        }

        function set($a){
            $this->a = $a;
        }

    }
?>