<?php
    class Dado{
        private $minNumDado;
        private $maxNumDado;

        /* 
        El constructor establece por defecto que la tirada mínima es 0
        y la máxima es 12
        */
        function __construct(){
            $this->minNumDado = 0;
            $this->maxNumDado = 12;
        }

        // El método setter de minNumDado no permite valores menores que 0

        function setMinNumDado($minNumDado){
            if ($minNumDado >= 0){
                $this->minNumDado = $minNumDado;
            }
        }

        function getMinNumDado(){
            return $this->minNumDado;
        }
        
        // El método setter de maxNumDado no permite valores mayores que 12
        
        function setMaxNumDado($MaxNumDado){
            if ($maxNumDado <= 12){
                $this->maxNumDado = $maxNumDado;
            }
        }

        function getMaxNumDado(){
            return $this->maxNumDado;
        }
        
        function tirarDado(){
            return rand($this->minNumDado, $this->maxNumDado);
        }
    }
?>