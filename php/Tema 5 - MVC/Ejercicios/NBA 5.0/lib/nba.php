<?php

    require 'query.php';

    class NBA extends Query{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'nba';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function listaEquipos(){
            return parent::select('equipos', 'nombre');
        }

        function listaEquiposCompleta(){
            return parent::select('equipos');
        }

        function listaConferencias(){
            return parent::select('equipos', 'conferencia', null, 'conferencia');
        }

        function listaDivisiones(){
            return parent::select('equipos', 'division', null, 'division');
        }          

        function listaPartidos($equipo){
            return parent::select(
                'partidos',
                ['equipo_local', 'puntos_local', 'puntos_visitante', 'equipo_visitante'], 
                'equipo_local = "'.$equipo.'" OR equipo_visitante = "'.$equipo.'"');
        }

        function listaJugadores($equipo){
            return parent::select(
                'jugadores', 
                ['Nombre', 'Procedencia', 'Altura', 'Peso', 'Posicion'],
                'Nombre_equipo = "'.$equipo.'"');
        }

        function listaTemp(){
            return parent::select('partidos', 'temporada', null, 'temporada');
        }    
        
        function maxAnotador($equipo){
            return parent::select(
                'jugadores', 
                ['Nombre', 'Puntos_por_partido'],
                'Nombre_equipo = "'.$equipo.'"',
                null,
                'Puntos_por_partido',
                true,
                1,
                'estadisticas',
                'jugadores.codigo',
                'estadisticas.jugador'
            );
        }    
        
        function maxAsistente($equipo){
            return parent::select(
                'jugadores', 
                ['Nombre', 'Asistencias_por_partido'],
                'Nombre_equipo = "'.$equipo.'"',
                null,
                'Asistencias_por_partido',
                true,
                1,
                'estadisticas',
                'jugadores.codigo',
                'estadisticas.jugador'
            );
        }

        //table, $fields = null, $joinTable = null, $joinColumn = null, $tableColumn = null, $conditions = null, $group = null, $order = null, $desc = false, $limit = null
        
        function partidosTemp($equipoLocal, $equipoVisitante, $temporada){
            return parent::select(
                'partidos', 
                ['equipo_local', 'puntos_local', 'puntos_visitante', 'equipo_visitante', 'temporada'],
                ['equipo_local = "'.$equipoLocal.'"', 'equipo_visitante = "'.$equipoVisitante.'"', 'temporada = "'.$temporada.'"'],
            );
        }

        function insertEquipo($nombre, $ciudad, $conferencia, $division){
            return parent::insert(
                'equipos',
                ['Nombre', 'Ciudad', 'Conferencia', 'Division'],
                [$nombre, $ciudad, $conferencia, $division]
            );
        }

        function updateEquipo($equipo, $nombre, $ciudad, $conferencia, $division){

            return parent::update(
                'equipos',
                ['Nombre', 'Ciudad', 'Conferencia', 'Division'],
                [$nombre, $ciudad, $conferencia, $division],
                'Nombre = "'.$equipo.'"'
            );
        }

        function deleteEquipo($equipo){
            return parent::delete(
                'equipos',
                'Nombre = "'.$equipo.'"'
            );
        }


    }

?>