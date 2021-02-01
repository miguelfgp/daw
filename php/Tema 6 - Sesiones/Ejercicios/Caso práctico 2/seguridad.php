<?php

require 'db.php';

    class Security{

        private $user;
        private $pass;

        function __construct(){
            session_start();
            if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
                $this->user = $_SESSION['user'];
                $this->pass = $this->encryptPass($_SESSION['pass']);
                //$this->login()
            }
        }

        function encryptPass($pass){
            return sha1($pass);
        }

        function login($user, $pass){
            if ((!$this->user === $user) || (!$this->pass === $pass)){
                session_destroy();
            }
        }

    }

?>