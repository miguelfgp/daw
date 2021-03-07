<?php

    class Request{
        
        private $response;
        private $validated = true;

        function __construct($response){
            $this->response = $response;
        }

        function validate($field){

            $this->validated = true;

            if (!isset($this->response[$field]) || empty($this->response[$field])){
                $this->validated = false;
            }
            return $this->validated;
        }

    }    

?>