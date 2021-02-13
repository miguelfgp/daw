<?php

    class Seguridad{

        private $user;

        function __construct(){
            session_start();
            if(isset($_SESSION['user'])){
                $this->user = $_SESSION['user'];
            }
        }

        function getUser(){
            return $this->user;
        }

        function unsetUser(){
            $this->user = null;
        }
    }

?>