<?php

require 'db.php';

    class GOT extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'gameofthrones';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }

        function resumen(){
            return parent::query('SELECT title, plot, creators, generes FROM titles');
        }

        function actores(){
            return parent::query('SELECT name, serie_name, episodes, season_start, season_end FROM cast');
        }

        function episodios(){
            return parent::query('SELECT episode FROM season_ep GROUP BY episode');
        }          

        function actoresEpisodio($episodio){
            return parent::query('SELECT name, serie_name, episode, season FROM season_ep WHERE episode = "'.$episodio.'"');
        }  

    }

?>