<?php
    class Torneo {
        private $colPartidos;
        private $premio;

        //METODO CONSTRUCTOR 
        public function __construct($premio){
            $this -> colPartidos = [];
            $this -> premio = $premio;
        }

        //METODOS DE ACCESO GETTERS Y SETTER
        public function setColPartidos($colPartidos){
            $this -> colPartidos = $colPartidos;
        }
        public function getColPartidos(){
            return $this -> colPartidos;
        }
        public function setPremio($premio){
            $this -> premio = $premio;
        }
        public function getPremio(){
            return $this -> premio;
        }
        //metodo toString
        public function __toString(){
            $partidos = $this -> getColPartidos();
            $cadenaCol = "";
            foreach ($partidos as $partido) {
                $cadenaCol .= $partido . "\n";
            }
            $cadena = "Premio: " . $this -> getPremio() . "\n";
            $cadena .= "Partidos: \n" . $cadenaCol;
            
            return $cadena;
        }    
    }



?>