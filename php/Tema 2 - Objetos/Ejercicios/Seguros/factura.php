<?php

    include 'traits.php'; 

    class Factura{
        
        private static $totalFact = 0;
        private $numFact;
        private $importe;
        private $clientes = array();

        public function __construct(){
            $this->numFact = ++Factura::$totalFact;
        }

        function datosFactura(){
            return $this->numFact;
        }

        use clientes;
        use iva;
    }
?>