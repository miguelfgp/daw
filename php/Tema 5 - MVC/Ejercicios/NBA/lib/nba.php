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

        function listaEquipos(){
            return parent::query('SELECT nombre FROM equipos');
        }

        function listaPartidos($equipo){
            return parent::query('SELECT equipo_local, puntos_local, puntos_visitante, equipo_visitante FROM partidos WHERE equipo_local = "'.$equipo.'" OR equipo_visitante = "'.$equipo.'"');
        }

        function listaJugadores($equipo){
            return parent::query('SELECT Nombre, Procedencia, Altura, Peso, Posicion FROM jugadores WHERE Nombre_equipo = "'.$equipo.'"');
        }
        
        function maxAnotador($equipo){
            return parent::query('SELECT Nombre, Puntos_por_partido FROM jugadores JOIN estadisticas ON jugadores.codigo = estadisticas.jugador WHERE Nombre_equipo = "'.$equipo.'" ORDER BY Puntos_por_partido DESC LIMIT 1');
        }    
        
        function maxAsistente($equipo){
            return parent::query('SELECT Nombre, Asistencias_por_partido FROM jugadores JOIN estadisticas ON jugadores.codigo = estadisticas.jugador WHERE Nombre_equipo = "'.$equipo.'" ORDER BY Asistencias_por_partido DESC LIMIT 1');
        }            

    }

?>