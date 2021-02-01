<?php

require 'connection.php';

    class User extends Connection{
        
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

?>