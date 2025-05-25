<?php
    class Producto {
        private $codigoBarra;
        private $descripcion;
        private $stock;
        private $porcentajeIva;
        private $precioCompra;
        private $objRubro;//Cuando dice referencia -> delegacion

        //METODO CONSTRUCTOR
        public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro){
            $this -> codigoBarra = $codigoBarra;
            $this -> descripcion = $descripcion;
            $this -> stock = $stock;
            $this -> porcentajeIva = $porcentajeIva;
            $this -> precioCompra = $precioCompra;
            $this -> objRubro = $objRubro;
        }

        //METODOS DE ACCESO (GETTERS Y SETTERS)
        public function getCodigoBarra(){
            return $this -> codigoBarra;
        }
        public function setCodigoBarra($codigoBarra){
            $this -> codigoBarra = $codigoBarra;
        }
        public function getDescripcion(){
            return $this -> descripcion;
        }
        public function setDescripcion($descripcion){
            $this -> descripcion = $descripcion;
        }       
        public function getStock(){
            return $this -> stock;
        }
        public function setStock($stock){
            $this -> stock = $stock;
        }   
        public function getPorcentajeIva(){
            return $this -> porcentajeIva;
        }
        public function setPorcentajeIva($porcentajeIva){
            $this -> porcentajeIva = $porcentajeIva;
        }
        public function getPrecioCompra(){
            return $this -> precioCompra;
        }
        public function setPrecioCompra($precioCompra){
            $this -> precioCompra = $precioCompra;
        }   
        public function getobjRubro(){
            return $this -> objRubro;
        }
        public function setobjRubro($objRubro){
            $this -> objRubro = $objRubro;
        }   

        //METODO TOSTRING
        public function __toString(){
            $mensaje = "-------Datos del Producto--------";
            $mensaje .= "Codigo de barra: " . $this -> getCodigoBarra() . "\n";
            $mensaje .= "Descripcion: " . $this -> getDescripcion() . "\n";
            $mensaje .= "Stock: " . $this -> getStock() . "\n";
            $mensaje .= "Porcentaje IVA: " . $this -> getPorcentajeIva() . "\n";
            $mensaje .= "Precio de compra: $" . $this -> getPrecioCompra() . "\n";
            $mensaje .= "Rubro: " . $this -> getobjRubro() . "\n";

            return $mensaje;
        }

        


    }




?>