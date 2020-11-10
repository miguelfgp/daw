<?php

    class DB{
        
        private $connect;
        private $query;
        private $array;

        function __construct($host, $user, $pass, $schema, $port){
            $this->connect = new mysqli($host, $user, $pass, $schema, $port);
        }

        function query($query){
            $this->query = $this->connect->query($query);

            if (is_object($this->query)){
                $this->array = [];

                while ($result = $this->query->fetch_assoc()){
                    $this->array[] = $result;
                }

                if (count($this->array) == 1){
                    $this->array = $this->array[0];
                }

                return $this->array;
            }
        }
    }

?>