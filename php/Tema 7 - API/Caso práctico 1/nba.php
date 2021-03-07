<?php

require 'db.php';

    class NBA extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'nba';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function selectTeamByTeam($nombre){
            return parent::query('SELECT * FROM equipos WHERE Nombre = "'.$nombre.'"');
        }

        function selectTeamByCity($ciudad){
            return parent::query('SELECT * FROM equipos WHERE Ciudad = "'.$ciudad.'"');
        }       
        
        function selectTeamByConference($conferencia){
            return parent::query('SELECT * FROM equipos WHERE Conferencia = "'.$conferencia.'"');
        }      

        function selectTeamByDivision($division){
            return parent::query('SELECT * FROM equipos WHERE Division = "'.$division.'"');
        }

        function insertTeam($jsonDatos){
            $datos = json_decode($jsonDatos, true);
            $nombre = $datos['Nombre'];
            $ciudad = $datos['Ciudad'];
            $conferencia = $datos['Conferencia'];
            $division = $datos['Division'];

            return parent::query('INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES ("'.$nombre.'", "'.$ciudad.'", "'.$conferencia.'", "'.$division.'")');
        }        

        function updateTeam($jsonDatos){
            $datos = json_decode($jsonDatos, true);
            $nombre = $datos['Nombre'];
            $ciudad = $datos['Ciudad'];
            $conferencia = $datos['Conferencia'];
            $division = $datos['Division'];
            $nombreNuevo = $datos['nombreNuevo'];

            return parent::query('UPDATE equipos SET Nombre = "'.$nombreNuevo.'", Ciudad = "'.$ciudad.'", Conferencia = "'.$conferencia.'", Division = "'.$division.'" WHERE (Nombre = "'.$nombre.'")');
        }     

        function deleteTeam($nombre){
            return parent::query('DELETE FROM equipos WHERE (nombre = "'.$nombre.'")');            
        }

    }    

?>