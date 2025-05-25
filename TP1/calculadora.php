<?php

    class Calculadora {
        private $numero1;
        private $numero2;

        public function __construct($numero1, $numero2) {
            $this -> numero1 = $numero1;
            $this -> numero2 = $numero2; 
        }

        public function getNumero1() {
            return $this -> numero1;
        }

        public function getNumero2() {
            return $this -> numero2;
        }

        public function setNumero1($numero1) {
            $this -> numero1 = $numero1;
        }

        public function setNumero2($numero2) {
            $this -> numero2 = $numero2;
        }

        public function sumar($numero1, $numero2) {
            return $numero1 + $numero2;
        }

        public function restar($numero1, $numero2) {
            return $numero1 - $numero2;
        }

        public function multiplicar($numero1, $numero2) {
            return $numero1 * $numero2;
        }

        public function dividir($numero1, $numero2) {
            return $numero1 / $numero2;
        }

        public function __toString(){
            return $this->getNumero1() . ", " . $this->getNumero2();
        }

        private function __destruct(){
            //echo $this . "Instancia destruida, no hay referencia hay este objeto \n";
        }

    }



?>