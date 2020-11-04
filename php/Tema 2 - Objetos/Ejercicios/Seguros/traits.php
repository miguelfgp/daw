<?php

    include 'cliente.php'; 
    include 'factura.php';
    include 'indemnizacion.php';

    trait clientes{

        private $clientes = array();

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

    trait calculos{

        private $importe;

        function totalSinIVA(){
            return $this->importe;
        }

        function calculaIVA($cantidad){
            return $cantidad += $cantidad * 0.21;
        }
    }

?>