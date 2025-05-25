<?php
    class PaqueteTuristico {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $fechaDesde;
        private $cantidadDias;
        private $objDestino;
        private $cantTotalPlazas;
        private $cantPlazasDisponibles;

        //METODO CONSTRUCTOR
        public function __construct($fechaDesde, $cantidadDias, $objDestino, $cantTotalPlazas){
            $this -> fechaDesde = $fechaDesde;
            $this -> cantidadDias = $cantidadDias;
            $this -> objDestino = $objDestino;
            $this -> cantTotalPlazas = $cantTotalPlazas;
            $this -> cantPlazasDisponibles = $cantTotalPlazas;//Esto lo inicializo con el total de plazas
            // porque va ir variando segun se venden paquetes

        }

        //METODOS DE ACCESO GET Y SET
        public function getFechaDesde(){
            return $this -> fechaDesde;
        }
        public function setFechaDesde($fechaDesde){
            $this -> fechaDesde = $fechaDesde;
        }
        public function getCantidadDias(){
            return $this -> cantidadDias;
        }
        public function setCantidadDias($cantidadDias){
            $this -> cantidadDias = $cantidadDias;
        }
        public function getObjDestino(){
            return $this -> objDestino;
        }
        public function setObjDestino($objDestino){
            $this -> objDestino = $objDestino;
        }
        public function getCantTotalPlazas(){
            return $this -> cantTotalPlazas;
        }
        public function setCantTotalPlazas($cantTotalPlazas){
            $this -> cantTotalPlazas = $cantTotalPlazas;
        }
        public function getCantPlazasDisponibles(){
            return $this -> cantPlazasDisponibles;
        }
        public function setCantPlazasDisponibles($cantPlazasDisponibles){
            $this -> cantPlazasDisponibles = $cantPlazasDisponibles;
        }
       
        public function __toString(){
            $mensaje = "\n------Paquete Turistico------\n";
            $mensaje .= "Inicio del Viaje: " . $this -> getFechaDesde() . "\n";
            $mensaje .= "Cantidad de dias: " . $this -> getFechaDesde() . "\n";
            $mensaje .= "Detalles del destino: " . $this -> getObjDestino() . "\n";
            $mensaje .= "Cantidad total de plazas: " . $this -> getCantTotalPlazas() . "\n";

            return $mensaje;
        }
        
    }







?>