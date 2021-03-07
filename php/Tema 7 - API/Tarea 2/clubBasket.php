<?php

require 'db.php';

    class Club extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'clubbasket';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function updatePlayer($jsonDatos){
            $datos = json_decode($jsonDatos, true);
            $id = $datos['id'];
            $nombreJugador = $datos['nombreJugador'];
            $posicion = $datos['posicion'];
            $numero = $datos['numero'];
            $edad = $datos['edad'];

            return parent::query('UPDATE plantilla SET nombreJugador = "'.$nombreJugador.'", posicion = "'.$posicion.'", numero = "'.$numero.'", edad = "'.$edad.'" WHERE (id = "'.$id.'")');
        }

        function deletePlayer($id){
            return parent::query('DELETE FROM plantilla WHERE (id = "'.$id.'")');            
        }

    }    

?>