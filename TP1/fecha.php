<?php

    class Fecha {
        //atributos o variables instancia
        private $dia;
        private $mes;
        private $anio;
        
        

        public function __construct($dia, $mes, $anio) { //los guiones bajos son funciones propias de la generacion de objetos
            $this -> dia = $dia;
            $this -> mes = $mes;
            $this -> anio = $anio;
        }

        public function getDia(){
            return $this -> dia; 
        }

        public function getMes() {
            return $this -> mes;
        }

        public function getAnio() {
            return $this -> anio;
        }

        public function setDia($dia) {
            $this -> dia = $dia;
        }

        public function setMes($mes) {
            $this -> mes = $mes;
        }

        public function setAnio($anio) {
            $this -> anio = $anio;
        }

        public function fecha_abreviada() {
            return $this -> getDia() . "/" . $this -> getMes() . "/" . $this -> getAnio() . "\n";
        }

        //Version mejorada seria un arreglo asociativo donde la clave seria uno y el valor enero. Verlo para modificar
        public function fecha_extendida(){
            $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
            return $this -> getDia() . " de " . $meses[$this -> getMes() - 1] . " de " . $this -> getAnio() . "\n";
        }

        /* Para saber si el anio es bisiesto se puede calcular el anio debe ser multiplo de 4 pero no divisible por cien O el anio debe ser divisible por 400 */
        public function esBisiesto($anio) {

            return (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0));
                
            
        }

        //otra opcion es declarar una variable afuera y pongo el valor de 29 o 28 para que no sea tan confuso el arreglo asociativo

        public function incrementar($entero, $fecha) {
            $diasMeses = [1 => 31, 2 => $this -> esBisiesto($fecha -> getAnio()) ? 29 : 28, 3=> 31, 4 => 30, 5=> 31, 6=> 30, 7 => 31, 8=> 31, 9=> 30, 10 => 31, 11=>30 , 12=> 31 ];//El ? es el verdadero y los : el falso
            
            $nuevoDia = $fecha -> getDia() + $entero;
            $nuevoMes = $fecha -> getMes();
            $nuevoAnio = $fecha -> getAnio(); 

          while ($nuevoDia > $diasMeses[$nuevoMes]) {
            $nuevoDia -= $diasMeses[$nuevoMes];
            $nuevoMes++;
            if ($nuevoMes > 12) {
                $nuevoMes = $nuevoMes - 12;
                $nuevoAnio++;
            }
          }
            return "La fecha incrementada es: " . $nuevoDia . "/" . $nuevoMes . "/" . $nuevoAnio . "\n";
          }

          public function __toString() {
            return $this -> getDia() . "/" . $this -> getMes() . "/" . $this -> getAnio() . "\n";
          }

    }


?>

