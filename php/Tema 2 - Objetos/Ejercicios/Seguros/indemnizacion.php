<?php 

    class Indemnizacion{
        
        private $indemnizado;

        public function __construct($importe, $indemnizado){
            $this->importe = $importe;
            $this->indemnizado = $indemnizado;
        }

        function indemnizado(){
            $cadena = 'DNI: ' . $this->indemnizado->getDni() . '<br>';
            $cadena .= 'Nombre: ' . $this->indemnizado->getNombre() . '<br>';
            $cadena .= 'Apellidos: ' . $this->indemnizado->getApellidos() . '<br>';
            return $cadena;
        }

        use clientes;
        use calculos;
    }
?>