<?php

require 'db.php';

    class Connection extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'nba';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }
    }

    class Resultados extends NBA{
        
        function __construct(){
            parent::__construct();
        }    

        function partidos($equipo){
            return parent::query('SELECT equipo_local, puntos_local, puntos_visitante, equipo_visitante FROM partidos WHERE equipo_local = "'.$equipo.'" OR equipo_visitante = "'.$equipo.'"');
        }   
        
        function partidosTemp($equipoLocal, $equipoVisitante, $temporada){
            return parent::query('SELECT equipo_local, puntos_local, puntos_visitante, equipo_visitante, temporada FROM partidos WHERE equipo_local = "'.$equipoLocal.'" AND equipo_visitante = "'.$equipoVisitante.'" AND temporada = "'.$temporada.'"');
        }

        function listaTemp(){
            return parent::query('SELECT temporada FROM partidos GROUP BY temporada');
        }   


    }

    class Clubes extends NBA{

        function __construct(){
            parent::__construct();
        }

        function listaEquipos(){
            return parent::query('SELECT nombre FROM equipos');
        }

        function tablaEquipos(){
            return parent::query('SELECT * FROM equipos');
        }

        function listaConferencias(){
            return parent::query('SELECT conferencia FROM equipos GROUP BY conferencia');
        }

        function listaDivisiones(){
            return parent::query('SELECT division FROM equipos GROUP BY division');
        }          

        function insertEquipo($nombre, $ciudad, $conferencia, $division){
            return parent::query('INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES ("'.$nombre.'", "'.$ciudad.'", "'.$conferencia.'", "'.$division.'")');
        }

        function updateEquipo($equipo, $nombre, $ciudad, $conferencia, $division){
            return parent::query('UPDATE equipos SET Nombre = "'.$nombre.'", Ciudad = "'.$ciudad.'", Conferencia = "'.$conferencia.'", Division = "'.$division.'" WHERE (Nombre = "'.$equipo.'")');
        }

        function deleteEquipo($equipo){
            return parent::query('DELETE FROM equipos WHERE (Nombre = "'.$equipo.'")');
        }


    }

    class Jugadores extends NBA{
        
        function __construct(){
            parent::__construct();
        }    

        function listaPosiciones(){
            return parent::query('SELECT posicion FROM jugadores GROUP BY posicion');
        }

        function tablaJugadores($equipo){
            return parent::query('SELECT codigo, Nombre, Procedencia, Altura, Peso, Posicion FROM jugadores WHERE Nombre_equipo = "'.$equipo.'"');
        }
        
        function maxAnotador($equipo){
            return parent::query('SELECT Nombre, Puntos_por_partido FROM jugadores JOIN estadisticas ON jugadores.codigo = estadisticas.jugador WHERE Nombre_equipo = "'.$equipo.'" ORDER BY Puntos_por_partido DESC LIMIT 1');
        }    
        
        function maxAsistente($equipo){
            return parent::query('SELECT Nombre, Asistencias_por_partido FROM jugadores JOIN estadisticas ON jugadores.codigo = estadisticas.jugador WHERE Nombre_equipo = "'.$equipo.'" ORDER BY Asistencias_por_partido DESC LIMIT 1');
        }

        function insertJugador($nombre, $procedencia, $altura, $peso, $posicion, $equipo){
            
            $idMax = parent::query('SELECT MAX(codigo) FROM jugadores');
            $id = (int) $idMax['MAX(codigo)'];
            $id++;
            
            return parent::query('INSERT INTO jugadores (codigo, Nombre, Procedencia, Altura, Peso, Posicion, Nombre_equipo) VALUES ("'.$id.'", "'.$nombre.'", "'.$procedencia.'", "'.$altura.'", "'.$peso.'", "'.$posicion.'",  "'.$equipo.'")');
        }

        function updateJugador($id, $nombre, $procedencia, $altura, $peso, $posicion){
            return parent::query('UPDATE jugadores SET Nombre = "'.$nombre.'", Procedencia = "'.$procedencia.'", Altura = "'.$altura.'", Peso = "'.$peso.'", Posicion = "'.$posicion.'" WHERE (codigo = "'.$id.'")');
        }

        function deleteJugador($id){
            return parent::query('DELETE FROM jugadores WHERE (codigo = "'.$id.'")');
        }

    }    

?>