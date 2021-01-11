<?php

    // include 'otro.php';
    // require 'otro.php';

    // class Clase extends ClasePadre

    class Empleado{
        private $numero;
        private $nombre;
        private $puesto;
        private $jefe;
        private $fechaAlta;
        private $salario;
        private $comision;
        private $dNumero;


        function __construct($numero, $nombre, $puesto, $jefe, $fechaAlta, $salario, $comision, $dNumero){
            $this->numero = $numero;
            $this->nombre = $nombre;
            $this->puesto = $puesto;
            $this->jefe = $jefe;
            $this->fechaAlta = $fechaAlta;
            $this->salario = $salario;
            $this->comision = $comision;
            $this->dNumero = $dNumero;
        }

        function getNumero(){
            return $this->numero;
        }

        function setNumero($numero){
            $this->numero = $numero;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getPuesto(){
            return $this->puesto;
        }

        function setPuesto($puesto){
            $this->puesto = $puesto;
        }

        function getJefe(){
            return $this->jefe;
        }

        function setJefe($jefe){
            $this->jefe = $jefe;
        }

        function getFechaAlta(){
            return $this->fechaAlta;
        }

        function set($fechaAlta){
            $this->fechaAlta = $fechaAlta;
        }

        function getSalario(){
            return $this->salario;
        }

        function setSalario($salario){
            $this->salario = $salario;
        }

        function getComision(){
            return $this->comision;
        }

        function setComision($comision){
            $this->comision = $comision;
        }

        function getDNumero(){
            return $this->dNumero;
        }

        function setDNumero($dNumero){
            $this->dNumero = $dNumero;
        }


    }
?>