<?php
    class Cuota{
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $numero;
        private $monto_cuota;
        private $monto_interes;
        private $cancelada;

        //METODO CONSTRUCTOR
        public function __construct($numero, $monto_cuota, $monto_interes, $cancelada) {
            $this -> numero = $numero;
            $this -> monto_cuota = $monto_cuota;
            $this -> monto_interes = $monto_interes;
            $this -> cancelada = $cancelada;
        }

        //METODOS DE ACCESO GET Y SET
        //NUMERO 
        public function getNumero()
        {
            return $this->numero;
        }

        public function setNumero($numero)
        {
            $this->numero = $numero;

        }

        //MONTO CUOTA
        public function getMonto_cuota()
        {
            return $this->monto_cuota;
        }

        public function setMonto_cuota($monto_cuota)
        {
            $this->monto_cuota = $monto_cuota;

        }

        //MONTO INTERES
        public function getMonto_interes()
        {
             return $this->monto_interes;
        }

        public function setMonto_interes($monto_interes)
        {
            $this->monto_interes = $monto_interes;

        }

        //CANCELADA
        public function getCancelada()
        {
            return $this->cancelada;
        }

        public function setCancelada($cancelada)
        {
            $this->cancelada = $cancelada;

        }

        //METODO DE LA CLASE darMontoFinalCuota
        /**  Implementar el método darMontoFinalCuota()  
         * que retorna el importe total de la cuota mas los intereses que deben ser aplicados.
         * @return float $montoCuota
        */

        public function darMontoFinalCuota() {
            //Sumando el valor de la cuota mas el monto del interes obtengo el valor de la cuota
            $montoCuota = $this -> getMonto_cuota() + $this -> getMonto_interes();

            return $montoCuota;
        }


        //METODO TOSTRING
        public function __toString() {
            $estado = $this -> getCancelada() ? "Si" : "No";

            $mensaje = "\n*****************Estado de la cuota*****************\n";
            $mensaje .= "Monto cuota: $" . $this -> getMonto_cuota() . ".-\n";
            $mensaje .= "Monto interes: $" . $this -> getMonto_interes() . ".-\n";
            $mensaje .= "Cancelada: " . $estado . "\n";
            $mensaje .= "Monto final de la cuota: $" . $this -> darMontoFinalCuota() . ".-\n";
            $mensaje .= "****************************************************\n";

            return $mensaje;
        }

    }





?>