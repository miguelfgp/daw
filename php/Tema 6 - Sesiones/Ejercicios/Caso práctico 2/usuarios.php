<?php

require 'db.php';

    class Usuarios extends DB{
        
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '123456';
        private $schema = 'usuarios';
        private $port = 3306;

        function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->schema, $this->port);
        }
        
        function getUsers(){
            return parent::query('SELECT usuario FROM usuarios', 'usuario');
        }

        function searchUser($user){
            $usersList = $this->getUsers();

            $userFound = false;
            $counter = 0;

            while($counter < count($usersList) && !$userFound){
                if ($usersList[$counter] == $user){
                    $userFound = true;
                }
                $counter += 1;
            }

            return $userFound;
        }

        function getUserPass($user){
            return parent::query('SELECT pass FROM usuarios WHERE usuario = "'.$user.'"', 'pass');
        }
        
        function getUserName($user){
            return parent::query('SELECT nombre FROM usuarios WHERE usuario = "'.$user.'"', 'nombre');
        }
        
        function getUserSurname($user){
            return parent::query('SELECT apellidos FROM usuarios WHERE usuario = "'.$user.'"', 'apellidos');
        }              

        function insertUser($name, $surname, $mail, $pass){            
            return parent::query('INSERT INTO usuarios (usuario, nombre, apellidos, email, rol, pass) VALUES ("'.$mail.'", "'.$name.'", "'.$surname.'", "'.$mail.'", "user", "'.$pass.'")');
        }

        function updateUser($usuario, $nombre, $apellidos){
            return parent::query('UPDATE usuarios SET nombre = "'.$nombre.'", apellidos = "'.$apellidos.'" WHERE (usuario = "'.$usuario.'")');
        }

    }    

?>