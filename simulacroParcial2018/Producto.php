<?php

    class Producto {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $codigobarra;
        private $nombre;
        private $marca;
        private $color;
        private $talle;
        private $descripcion;
        private $stock;

        //METODO CONSTRUCTOR
        public function __construct($codigobarra, $nombre, $marca, $color, $talle, $descripcion, $stock) {
            $this -> codigobarra = $codigobarra;
            $this -> nombre = $nombre;
            $this -> marca = $marca;
            $this -> color = $color;
            $this -> talle = $talle;
            $this -> descripcion = $descripcion;
            $this -> stock = $stock;
        }

        //METODOS DE ACCESO GET Y SET
        public function getCodigobarra() {
            return $this -> codigobarra;
        }
        public function setCodigobarra($codigobarra) {
            $this -> codigobarra = $codigobarra;
        }
        public function getNombre() {
            return $this -> nombre;
        }
        public function setNombre($nombre) {
            $this -> nombre = $nombre;
        }
        public function getMarca() {
            return $this -> marca;
        }
        public function setMarca($marca) {
            $this -> marca = $marca;
        }
        public function getColor() {
            return $this -> color;
        }
        public function setColor($color) {
            $this -> color = $color;
        }
        public function getTalle() {
            return $this -> talle;
        }
        public function setTalle($talle) {
            $this -> talle = $talle;
        }   
        public function getDescripcion() {
            return $this -> descripcion;
        }
        public function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion;
        }
        public function getStock() {
            return $this -> stock;
        }
        public function setStock($stock) {
            $this -> stock = $stock;
        }
        
        public function __toString() {
            $mensaje = "\n----PRODUCTO----\n";
            $mensaje .= "Codigo de Barra: " . $this -> getCodigobarra() . "\n";
            $mensaje .= "Nombre: " . $this -> getNombre() . "\n";
            $mensaje .= "Marca: " . $this -> getMarca() . "\n";
            $mensaje .= "Color: " . $this -> getColor() . "\n";
            $mensaje .= "Talle: " . $this -> getTalle() . "\n";
            $mensaje .= "descripcion: " . $this -> getDescripcion() . "\n";
            $mensaje .= "Stock: " . $this -> getStock() . "\n";

            return $mensaje;
        }

        /** Implementar el método actualizarStock que recibe por parámetro una cantidad y actualiza el valor del
         *stock del producto según corresponda. Si el valor recibido por parámetro es >0, 
         * entonces se incrementa el stock y si el valor es <0 se decrementa el stock del producto.  
         * @param int $cantidadProductos*/

        public function actualizarStock($cantidadProductos) {

            //Obtengo la cantidad actual de stock
            $stockActual = $this -> getStock();

            if ($cantidadProductos > 0) {
                $stockActual += $cantidadProductos;
                $this -> setStock($stockActual);
            } else {
                $stockActual -= $cantidadProductos;
                $this -> setStock($stockActual);
            }
        }

        





    }
    





?>