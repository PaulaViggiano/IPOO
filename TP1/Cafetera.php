<?php
    class Cafetera {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $capacidadMaxima; //capacidad maxima de la cafetera, se mide en ml.
        private $cantidadActual; //cantidad actual en la cafereta, se mide en ml.

        //METODO CONSTRUCTOR
        public function __construct($capacidadMax, $cantActual) {
            $this -> capacidadMaxima = $capacidadMax;
            $this -> cantidadActual = $cantActual;
        }

        //METODOS DE ACCESO - METODO GET
        public function getCapacidadMaxima(){
            return $this -> capacidadMaxima;
        }

        public function getCantidadActual(){
            return $this -> cantidadActual;
        }

        //METODOS DE ACCESO - METODO SET
        public function setCapacidadMaxima($capacidadMax){
            $this -> capacidadMaxima = $capacidadMax;
        }

        public function setCantidadActual($cantActual){
            $this -> cantidadActual = $cantActual;
        }

        //METODOS O COMPORTAMIENTOS DE LA CLASE
        public function llenarCafetera() {
            
            if ($this -> getCapacidadMaxima() > $this -> getCantidadActual()) {
                $this -> setCantidadActual($this -> getCapacidadMaxima());
            }

            return $this -> getCantidadActual();
        }

        /* ------------------------------------------------------------- */
        public function servirTaza($cantidad) {
            $cantidadActualCafetera = $this -> getCantidadActual(); //cant actual de cafe
            $seSirvio = false; //booleana para indicar si se sirvio el total o no de cafe

            if ($cantidadActualCafetera >= $cantidad) {
                $cantidadActualCafetera -= $cantidad;
                $seSirvio = true;
                $this -> setCantidadActual($cantidadActualCafetera);
            } else {
                $seSirvio = false;
                $this -> setCantidadActual(0);
            }

            return $seSirvio;


        }

        /* ---------------------------------------------------------- */
        public function vaciarCafetera(){

            return $this -> setCantidadActual(0);

        }

        /* ------------------------------------------------------------ */
        public function agregarCafe($cantidad) {
            $cantidadActualCafetera = $this -> getCantidadActual();

            if (($cantidadActualCafetera + $cantidad) <= $this -> getCapacidadMaxima()) {
                 $cantidadActualCafetera += $cantidad; 
                 $this -> setCantidadActual($cantidadActualCafetera);
            } else {
                $cantidadActualCafetera = $this -> setCantidadActual(1000);
            }

            return $cantidadActualCafetera;
        }
        

        //METODO TOSTRING
        public function __tostring() {
            return "\nLa capacidad maxima de la cafetera es de: " . $this -> getCapacidadMaxima() . "\n" . 
                    "La cantidad actual de cafe es: " . $this -> getCantidadActual() . "\n";
        }

    }



?>