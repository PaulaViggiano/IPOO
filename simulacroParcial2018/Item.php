<?php
    class Item {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $cantidadVendida;
        private $objProducto;

        //METODO CONSTRUCTOR
        public function __construct($cantidadVendida, $objProducto) {
            $this -> cantidadVendida = $cantidadVendida;
            $this -> objProducto = $objProducto;
        }

        //METODOS DE ACCESO GET Y SET
        public function getCantidadVendida() {
            return $this -> cantidadVendida;
        }
        public function setCantidadVendida($cantidadVendida) {
            $this -> cantidadVendida = $cantidadVendida;
        }   
        public function getObjProducto() {
            return $this -> objProducto;
        }
        public function setObjProducto($objProducto) {
            $this -> objProducto = $objProducto;
        }

        //METODO TOSTRING
        public function __toString(){
            $mensaje = "\n----ITEM----\n";
            $mensaje .= "Cantidad vendida: " . $this -> getCantidadVendida() . "\n";
            $mensaje .= "Producto: " . $this -> getObjProducto() . "\n";

            return $mensaje;
        }

    }





?>