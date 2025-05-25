<?php
    class Destino {
        //ATRIBUTOS - VARIABLES INSTANCIAS
        private $identificacion;
        private $nombre;
        private $valorDia;

        //CONSTRUCTOR
        public function __construct($identificacion, $nombre, $valorDia) {
            $this->identificacion = $identificacion;
            $this->nombre = $nombre;
            $this->valorDia = $valorDia;
        }

        //METODOS DE ACCESO - GETTERS Y SETTERS
        public function getIdentificacion() {
            return $this->identificacion;
        }
        public function setIdentificacion($identificacion) {
            $this->identificacion = $identificacion;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function getValorDia() {
            return $this->valorDia;
        }
        public function setValorDia($valorDia) {
            $this->valorDia = $valorDia;
        }

        //METODO PARA MOSTRAR LOS DATOS DEL DESTINO - toString
        public function __toString(){  
            $mensaje = "------DESTINO------\n";
            $mensaje .= "Identificacion: " . $this -> getIdentificacion() . "\n";
            $mensaje .= "Nombre del Destino: " . $this -> getNombre() . "\n";
            $mensaje .= "Valor por dia: $" . $this -> getValorDia() . "\n";
            return $mensaje;

        }

    }




?>