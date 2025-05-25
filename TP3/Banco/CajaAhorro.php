<?php
    class CajaAhorro extends Cuenta{

        //METODO CONSTRUCTOR
        public function __construct($numeroCuenta, $saldo, $objCliente){
           parent::__construct($numeroCuenta, $saldo, $objCliente);
        }

        //METODO TOSTRING
        public function __toString(){
            
            $mensaje = parent::__toString();
            
            return $mensaje;
        }

        


    }



?>