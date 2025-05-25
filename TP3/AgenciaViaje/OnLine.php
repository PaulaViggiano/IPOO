<?php
    class OnLine extends Venta {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $porcentajeDesc;

        //METODO CONSTRUCTOR
        public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente) {

            parent::__construct($fecha, $objPaquete, $cantPersonas, $objCliente);
            $this -> porcentajeDesc = 0.20;
        }

        //METODOS DE ACCESO - GETTERS Y SETTERS
        public function getPorcentajeDesc(){
            return $this -> porcentajeDesc;
        }
        public function setPorcentajeDesc($porcentajeDesc){
            $this -> porcentajeDesc = $porcentajeDesc;
        }   

        public function __toString() {
            $mensaje = "------VENTA ONLINE------";
            $mensaje .= parent::__toString();
            $mensaje .= "Porcentaje de descuento: " . $this -> getPorcentajeDesc() . "\n";

            return $mensaje;
        }

        public function darImporteVenta() {
            $importeVenta = parent::darImporteVenta();
            $descuento = $this -> getPorcentajeDesc();

            $precioTotalOnline = $importeVenta * (1-($descuento));

            return $precioTotalOnline;
        }
    }




?>