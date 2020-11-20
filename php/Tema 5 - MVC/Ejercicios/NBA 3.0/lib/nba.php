<?php

require 'db.php';

    class NBA extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'nba';
        private $port = 3306;

        function tablaJugadores($equipo){
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