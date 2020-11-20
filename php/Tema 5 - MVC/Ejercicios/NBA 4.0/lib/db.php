<?php
    
    class DB{
        
        private $connect;
        private $query;
        private $array;

        function __construct($host, $user, $pass, $schema, $port){
            $this->connect = new mysqli($host, $user, $pass, $schema, $port);
            $this->error();
        }

        function error(){
            if($this->connect->connect_errno){
                echo '<h3>Fallo al conectar MySQL (' . $this->connect->connect_errno . ': ' . $this->connect_error . '</h3>';
            }
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
            } else {
                return $this->query;
            }
        }
    }

?>