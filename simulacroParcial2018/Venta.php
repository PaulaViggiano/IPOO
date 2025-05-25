<?php
    class Venta {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $fecha;
        private $denominacionCliente;
        private $numeroFactura;
        private $tipoComprobante;
        private $colItems;

        //METODO CONSTRUCTOR
        public function __construct($fecha, $denominacionCliente, $numeroFactura, $tipoComprobante){
            $this -> fecha = $fecha;
            $this -> denominacionCliente = $denominacionCliente;
            $this -> numeroFactura = $numeroFactura;
            $this -> tipoComprobante = $tipoComprobante;
            $this -> colItems = [];
        }

        //METEDOS DE ACCESO GET Y SET
        public function getFecha() {
            return $this -> fecha;
        }
        public function setFecha($fecha) {
            $this -> fecha = $fecha;
        }       
        public function getDenominacionCliente() {
            return $this -> denominacionCliente;
        }
        public function setDenominacionCliente($denominacionCliente) {
            $this -> denominacionCliente = $denominacionCliente;
        }
        public function getNumeroFactura() {
            return $this -> numeroFactura;
        }
        public function setNumeroFactura($numeroFactura) {
            $this -> numeroFactura = $numeroFactura;
        }
        public function getTipoComprobante() {
            return $this -> tipoComprobante;
        }
        public function setTipoComprobante($tipoComprobante) {
            $this -> tipoComprobante = $tipoComprobante;
        }
        public function getColItems() {
            return $this -> colItems;
        }
        public function setColItemsVendidos($colItems) {
            $this -> colItems = $colItems;
        }

        //METODO TOSTRING
        public function __toString(){

            $arregloItems = $this -> getColItems();
            $mensajeCol = "";
            foreach ($arregloItems as $item) {
                $mensajeCol .=  $item . "\n";
            }
            $mensaje = "\n------VENTA------\n";
            $mensaje .= "Fecha: " . $this -> getFecha() . "\n";
            $mensaje .= "Denominacion Cliente: " . $this -> getDenominacionCliente() . "\n";
            $mensaje .= "Numero de Factura: " . $this -> getNumeroFactura() . "\n";
            $mensaje .= "Tipo de Comprobante: " . $this -> getTipoComprobante() . "\n";
            $mensaje .= "Coleccion de Items " . $mensajeCol . "\n";


            return $mensaje;
        }

        /** Implementar el método incorporarProducto que recibe por parámetro un producto y la cantidad que desea
         * registrarse en la venta. Si es posible realizar la venta, teniendo en cuenta la cantidad solicitada y la
         *cantidad en stock del producto, se crea un item y se incorpora a la colección de items de la venta. Recordar
         *que debe actualizarse el stock del producto si la venta se realiza con éxito. El método debe retornar verda
         *dero en caso para el caso que se pueda incorporar el producto para vender o falso en caso contrario.  
         *@param object $producto
         *@param int $cantidad
         *@return booleano $incorporado
        */

        public function incorporarProducto($producto, $cantidad) {
            $stockProducto = $producto -> getStock();
            $arregloItems = $this -> getColItems();
            $incorporado = false;

            if ($stockProducto >= $cantidad && !$incorporado) {
                $itemCreado = new Item($cantidad,$producto);//Creo una instancia de Item
                $stockProducto -= $cantidad;
                $producto -> setStock($stockProducto);
                $arregloItems[] = $itemCreado;
                $this -> setColItemsVendidos($arregloItems);
                $incorporado = true;
            } 
            return $incorporado;
            
        }

    }




?>