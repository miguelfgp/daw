<?php 

    class Factura{
        
        private static $totalFact = 0;
        private $numFact;
        private $importe;

        public function __construct($importe){
            $this->importe = $importe;
            $this->numFact = ++Factura::$totalFact;
        }

        function datosFactura(){
            return $this->numFact;
        }

        use clientes;
        use calculos;
    }
?>