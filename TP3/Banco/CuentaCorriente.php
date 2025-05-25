<?php
    class CuentaCorriente extends Cuenta {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $montoDescubierto;

        //METODO CONSTRUCTOR
        public function __construct($numeroCuenta, $saldo, $objCliente, $montoDescubierto){
            parent::__construct($numeroCuenta, $saldo, $objCliente);
            $this -> montoDescubierto = $montoDescubierto;
        } 

        //METODOS DE ACCESO
        public function getMontoDescubierto(){
            return $this -> montoDescubierto;
        }

        public function setMontoDescubierto($montoDescubierto){
            $this -> montoDescubierto = $montoDescubierto;
        }

        //METODO TOSTRING
        public function __toString(){
           
            $mensaje = parent::__toString();
            $mensaje .= "Monto descubierto: " . $this -> getMontoDescubierto() . "\n";
            
            return $mensaje;
        }

        /** realizarRetiro(monto): permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
         * @param float $montoRetirar
         * @return float
        */ 
        public function realizarRetiro($monto){
            
            $saldoActual = $this -> getSaldo();//Obtengo el saldo del cliente
            $descubierto = $this -> getMontoDescubierto();//Obtengo el descubierto del cliente
            $saldoYdescubierto = $saldoActual + $descubierto;

            $retiroPolimorfismo = parent::realizarRetiro($monto);//Implemento el metodo de la clase padre Cuenta
            
            if (!$retiroPolimorfismo) {
                if ($saldoYdescubierto >= $monto) {
                    $saldoActualizado = $saldoActual - $monto;
                    $this -> setSaldo($saldoActualizado);
                    $retiroPolimorfismo = true;
                } 
            }
            
            return $retiroPolimorfismo; 
            
        } 

    }




?>