<?php
    //Clase abstracta o Padre de class cuenta corriente y caja ed ahorro
    class Cuenta {
        // ATRIBUTOS - VARIABLES INSTANCIAS
        private $numeroCuenta;
        private $saldo;
        private $objCliente;
        

        //METODO CONSTRUCTOR
        public function __construct($numeroCuenta, $saldo, $objCliente){
            
            $this -> numeroCuenta = $numeroCuenta;
            $this -> saldo = $saldo;
            $this -> objCliente = $objCliente;
            
        }

        //METODOS DE ACCESO GET Y SET
        public function getNumeroCuenta(){
            return $this -> numeroCuenta;
        }

        public function setNumeroCuenta($numeroCuenta){
            $this -> numeroCuenta = $numeroCuenta;
        }

        public function getSaldo(){
            return $this -> saldo;
        }

        public function setSaldo($saldo){
            $this -> saldo = $saldo;
        }

        public function getObjCliente(){
            return $this -> objCliente;
        }

        public function setObjCliente($objCliente){
            $this -> objCliente = $objCliente;
        }

       

        public function __toString(){
            
            
            $mensaje = "Cliente: " . $this -> getObjCliente() . "\n";
            $mensaje .= "Numero de cuenta: " . $this -> getNumeroCuenta() . "\n";
            $mensaje .= "Saldo: " . $this -> getSaldo() . "\n";
            
            return $mensaje;
        }

        /** saldoCuenta() : retorna el saldo de la cuenta 
         * @return float $saldoActual
        */
        public function saldoCuenta(){
            $saldoActual = $this -> getSaldo();
            
            return $saldoActual;
        }

        /** realizarDeposito(monto): permite realizar un depósito a la cuenta una cantidad “monto” de dinero. 
         * @param float $monto
         * @return float $saldoActualizado
        */
        public function realizarDeposito($monto){
            $saldoActual = $this -> getSaldo();
            $saldoActualizado = $saldoActual + $monto;
            $this -> setSaldo($saldoActualizado);
            return $saldoActualizado;
        }

        //El metodo retiro lo hice en CC y CA porque cada clase necesito su propia logica.
        /** realizarRetiro(monto): permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
         * @param float $monto
         * @return booleano 
        */  
        public function realizarRetiro($monto){
            $retiro = false;
            $saldoActual = $this -> getSaldo();

            /* Condicional para realizar el retiro */
            if ($saldoActual >= $monto && !$retiro) {
                $saldoActualizado = $saldoActual - $monto;
                $this -> setSaldo($saldoActualizado);
                $retiro = true;
            } 

            return $retiro;
        }
    }


?>