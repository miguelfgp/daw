<?php

class Conversor{
    private $valor;

    function __construct($valor){
        $this->valor = $valor;
    }

    function setValor($valor){
        $this->valor = $valor;
    }    

    function getValor(){
        return $this->valor;
    }

    function convertirDivisa($divisa1, $divisa2){
        $tipoCambio = [
            "EUR" => [
                "GBP" => 0.9,
                "USD" => 1.18
            ],
            "GBP" => [
                "EUR" => 1.11,
                "USD" => 1.31
            ],
            "USD" => [
                "EUR" => 0.85,
                "GBP" => 0.77
            ]
        ];

        $this->setValor($this->getValor() * $tipoCambio[$divisa1][$divisa2]);
    }

}

?>