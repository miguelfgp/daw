<?php

    include 'cliente.php'; 

    trait clientes{
        function añadirCliente($cliente){

        $dni = $cliente->getDni();
        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
    
        $this->clientes[$dni] = [
                'nombre' => $nombre, 
                'apellidos' => $apellidos
            ];
        }    

        function datosCliente($dni){
            return $this->clientes[$dni]['nombre'] . ' ' . $this->clientes[$dni]['apellidos']; 
        }        
    }

    trait iva{
        function totalSinIVA(){

        }

        function calculaIVA($cantidad){
            return $cantidad += $cantidad * 0.21;
        }
    }

?>