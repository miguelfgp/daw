<?php

    include 'traits.php'; 

    class Factura{
        
        private $numFact;
        private $importe;
        private $clientes = array();

        function datosFactura(){
            return $this->numFact;
        }

        use clientes;
        use iva;
    }
?>