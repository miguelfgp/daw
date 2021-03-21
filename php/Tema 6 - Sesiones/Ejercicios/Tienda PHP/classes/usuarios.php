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

        function getData($field, $user){
            return parent::query('SELECT '.$field.' FROM usuarios WHERE usuario = "'.$user.'"', $field);
        }

        function insertUser($name, $surname, $mail, $pass){            
            return parent::query('INSERT INTO usuarios (usuario, nombre, apellidos, email, rol, pass) VALUES ("'.$mail.'", "'.$name.'", "'.$surname.'", "'.$mail.'", "User", "'.$pass.'")');
        }

        function updateUser($usuario, $nombre, $apellidos, $rol){
            return parent::query('UPDATE usuarios SET nombre = "'.$nombre.'", apellidos = "'.$apellidos.'", rol = "'.$rol.'" WHERE (usuario = "'.$usuario.'")');
        }

    }    

?>