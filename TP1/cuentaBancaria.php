<?php

    class CuentaBancaria {
        //Declaro una constante de cantidad de dias del anio para calcular el interes anual
        static $DIAS_ANIO = 365;

        //Declaro los atributos (variables instancia) en privado 
        private $numeroCuenta;
        private $objPersona;
        private $saldoActual;
        private $interesAnual;

        //Constructor, hace al objeto o instancia en el test con la palabra reservado new
        public function __construct($numC, $persona, $salC, $intC){
            $this -> numeroCuenta = $numC;
            $this -> objPersona = $persona;
            $this -> saldoActual = $salC;
            $this -> interesAnual = $intC;

        }

        //SET modifican o guardan los valores en los atributos
        public function setNumeroCuenta($numC){
            $this -> numeroCuenta = $numC;

        }

        public function setObjPersona($persona){
            $this -> objPersona = $persona;
        }

        public function setSaldoActual($salC){
            $this -> saldoActual = $salC;
        }

        public function setInteresAnual($intC){
            $this -> interesAnual = $intC;
        }

        //GET muestran los valores de los atributos
        public function getNumeroCuenta() {
            return $this -> numeroCuenta;
        }

        public function getObjPersona(){
            return $this -> objPersona;
        }

        public function getSaldoActual(){
            return $this -> saldoActual;
        }

        public function getInteresAnual(){
            return $this -> interesAnual;
        }

        //Funcion actualizar saldo basado en el interes anual
        public function actualizarSaldo(){
            $this -> setSaldoActual($this -> getSaldoActual() + $this -> getInteresAnual() / self::$DIAS_ANIO);
        }

        //Funcion depositar. Permite ingresar dinero en la cuenta
        public function depositar($cant){

            //declaro una variable booleana para saber si se pudo realizar el deposito o no
            $depoRealizado = false;

            if ($cant > 0) {
                $this -> setSaldoActual($this -> getSaldoActual() + $cant);
                $depoRealizado = true;
            }

            return $depoRealizado;
        }

        //Funcion retirar plata
        public function retirar($cant) {
            //Declaro una variable booleana para saber si pudo reritat dinero o no;
            $retiro = false;
            //Esta variable la genero para mostrar el saldo restante luego de retirar dinero;
            $saldoRestante = 0;

            if ($cant >= 0) {
                if ($cant <= $this -> getSaldoActual()) {
                    $saldoRestante = $this -> setSaldoActual($this -> getSaldoActual() - $cant);
                    $this -> setSaldoActual($saldoRestante);
                    $retiro = true;
                }
            }
            

            return $retiro;
        }

        public function __toString() {
            return "NUmero de cuenta: " . $this -> getNumeroCuenta() . "\n Dni cliente: " . $this -> getObjPersona() . "\n Saldo actual: " . $this -> getSaldoActual() . "\n interes anual: " . $this -> getInteresAnual(); 

        }




    }




?>