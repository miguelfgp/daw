<?php

    class Request{
        
        private $requestArray;
        private $fields;
        private $validated = true;

        function __construct($requestArray, $fields){
            $this->requestArray = $requestArray;
            $this->fields = $fields;
        }

        function validate(){

            foreach ($this->fields as $field){
                if (!isset($this->requestArray[$field]) || empty($this->requestArray[$field])){
                    $this->validated = false;
                }
            }

            return $this->validated;
        }

    }    

?>