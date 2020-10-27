<?php

class Conversor{
    private $euros;

    function setEuros($euros){
        $this->euros = $euros;
    }    

    function getEuros(){
        return $this->euros;
    }

    function convertirLibras($libras){
        $this->setEuros($libras * 0.91);
    }

}

?>