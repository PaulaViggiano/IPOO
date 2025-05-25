<?php
    class Venta {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $fecha;
        private $objPaquete;
        private $cantPersonas;
        private $objCliente;

        //METODO CONSTRUCTOR
        public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente){
            $this -> fecha = $fecha;
            $this -> objPaquete = $objPaquete;
            $this -> cantPersonas = $cantPersonas;
            $this -> objCliente = $objCliente;
        }

        //METODOS DE ACCESO - GETTERS Y SETTERS
        public function getFecha(){
            return $this -> fecha;
        }
        public function setFecha($fecha){
            $this -> fecha = $fecha;
        }
        public function getObjPaquete(){
            return $this -> objPaquete;
        }
        public function setObjPaquete($objPaquete){
            $this -> objPaquete = $objPaquete;
        }
        public function getCantPersonas(){
            return $this -> cantPersonas;
        }
        public function setCantPersonas($cantPersonas){
            $this -> cantPersonas = $cantPersonas;
        }
        public function getObjCliente(){
            return $this -> objCliente;
        }
        public function setObjCliente($objCliente){
            $this -> objCliente = $objCliente;
        }
        public function __toString(){
            $mensaje = "\n------VENTA------\n";
            $mensaje .= "Fecha de la venta: " . $this -> getFecha() . "\n";
            $mensaje .= "Detalles del paquete: " . $this -> getObjPaquete() . "\n";
            $mensaje .= "Cantidad de personas: " . $this -> getCantPersonas() . "\n";
            $mensaje .= "Detalles del cliente: " . $this -> getObjCliente() . "\n";

            return $mensaje;
        }

        /** Implementar el método darImporteVenta() que retorna el valor que debe ser abonado por el cliente y
         *redefinirlo según sea necesario.
         *@return float $totalAPagar;
        */

        public function darImporteVenta(){
            
            $precioTotal = 0;//Inicializo la variable en cero
            $paquete = $this -> getObjPaquete();//Obtengo el objeto paquete
            $cantidadDias = $paquete -> getCantidadDias();//Por el objeto paquete obtengo la cantidad de dias
            $cantPasajeros = $this -> getCantPersonas();//Obtengo la cantidad de personas
            $destino = $paquete -> getObjDestino();//Por el obj paquete obtengo el objeto destino
            $precioPorDia = $destino -> getValorDia();//Por el objeto destino obtengo el valor por dia

            $precioTotal = $cantidadDias * $precioPorDia * $cantPasajeros;

            return $precioTotal;

        }
        

    }


?>