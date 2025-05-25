<?php
    class Banco {
        //ATRIBUTOS O VARIABLES INSTANCIAS
        private $coleccionCuentaCorriente; 
        private $coleccionCajaAhorro;
        private $ultimoValorCuentaAsignado;
        private $coleccionCliente;

        public function __construct($coleccionCuentaCorriente, $coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionCliente){
            $this -> coleccionCuentaCorriente = $coleccionCuentaCorriente;
            $this -> coleccionCajaAhorro = $coleccionCajaAhorro;
            $this -> ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
            $this -> coleccionCliente = $coleccionCliente;
        }

        public function getColeccionCuentaCorriente(){
            return $this -> coleccionCuentaCorriente;
        }

        public function setColeccionCuentaCorriente($coleccionCuentaCorriente){
            $this -> coleccionCuentaCorriente = $coleccionCuentaCorriente;
        }

        public function getColeccionCajaAhorro(){
            return $this -> coleccionCajaAhorro;
        }

        public function setColeccionCajaAhorro($coleccionCajaAhorro){
            $this -> coleccionCajaAhorro = $coleccionCajaAhorro;
        }

        public function getUltimoValorCuentaAsignado(){
            return $this -> ultimoValorCuentaAsignado;
        }

        public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado){
            $this -> ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        }

        public function getColeccionCliente(){
            return $this -> coleccionCliente;
        }

        public function setColeccionCliente($coleccionCliente){
            $this -> coleccionCliente = $coleccionCliente;
        }

        public function __toString() {
            //Guarda la coleccion de cuenta corriente en un string
            $cuentasCorrientes = $this -> getColeccionCuentaCorriente();
            $cadenaCtaCte = "";
            

            foreach ($cuentasCorrientes as $cuentaCorriente) {
                $cadenaCtaCte .= $cuentaCorriente . "\n";
                
            }

            //guardo la coleccion de caja de ahorro

            $cajasAhorro = $this -> getColeccionCajaAhorro();
            $cadenaCAhorro = "";
            
            foreach ($cajasAhorro as $cajaAhorro) {
                $cadenaCAhorro .= $cajaAhorro . "\n";
                
            }

            //Guardo la coleccion de clientes
            $colClientes = $this -> getColeccionCliente();
            $cadenaClientes = "";
           
            foreach ($colClientes as $cliente) {
                $cadenaClientes .=  $cliente ."\n" ;
            
            }

            $cadena = (
                "Cuentas corrientes: " . $cadenaCtaCte . "\n" . 
                "Cajas de Ahorro: " . $cadenaCAhorro . "\n" . 
                "Clientes: " . $cadenaClientes . "\n" . 
                "Ultima cuenta agregada: " . $this -> getUltimoValorCuentaAsignado() . "\n"
            );

            return $cadena;

        }

        /**  incorporarCliente(objCliente): permite agregar un nuevo cliente al Banco
        *@param object $objCliente
        *@return booleano $seIncorporo    */
        public function incorporarCliente($objCliente) {
            $incorporado = false; //Si ya esta en la base de datos no se incorpora
            $colClientes = $this -> getColeccionCliente();
            $seIncorporo = false;//Variable de retorno

            /* Validacion para incorporar el cliente si no existe */
            $i = 0;
            $cantColClientes = count($colClientes);
            while ($i < $cantColClientes && !$incorporado) {
                $dni = $colClientes[$i] -> getDni();
                if ($dni === $objCliente -> getDni()) {
                  
                  $incorporado = true;//La voy a usar para incorporar al cliente
                } 
                $i++;
            }

            if (!$incorporado) {
                $colClientes[] = $objCliente;  
                $this -> setColeccionCliente($colClientes);
                $seIncorporo = true;
            }
        
            return $seIncorporo;
            
        }

        /** incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
        *Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
        *del Banco.  
        *@param int $numeroCliente
        *@param float $montoDescubierto 
        *@return booleano
        */
        public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto){
            $retorno = false;
            $colClientes = $this -> getColeccionCliente();
            $cantColClientes = count($colClientes);
            $colCtaCte = $this -> getColeccionCuentaCorriente();
            $numCuenta = count($colCtaCte) + 1;//Guardo el numero de la proxima cuenta corriente (La uso en newCtaCte)
            $i = 0;

            $exito = false;//Variable para detener el ciclo while

            //primero busco que el numero de cliente pertenece a un cliente del banco
            while ($i < $cantColClientes && !$exito) {
               $elCliente = $colClientes[$i];
               
               if ($elCliente -> getNroCliente() == $numeroCliente) {
                //CREO LA NUEVA CTA CTE
                $nuevaCtaCte = new CuentaCorriente($numCuenta, 0, $elCliente, $montoDescubierto);
                $colCtaCte[] = $nuevaCtaCte;
                $this -> setColeccionCuentaCorriente($colCtaCte);
                $exito = true;
                $retorno = true;
               }

               $i++;
            
            }
            return $retorno;
        }

        /** incorporarCajaAhorro(numeroCliente):Agregar una nueva Caja de Ahorro a la colección de cajas
            *de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco.
            *@param int $numeroCliente 
            * @return booleano $retorno
        */

        public function incorporarCajaAhorro($numeroCliente){
            $colCajaA = $this -> getColeccionCajaAhorro();//Obtengo coleccion de caja de ahorro
            $numCuentaCaja = count($this-> getColeccionCuentaCorriente());
            $colCliente = $this -> getColeccionCliente();//Obtengo la coleccion de cliente
            $cantClientes = count($colCajaA);//Cantidad de posiciones del arreglo caja de ahorro
            $i = 0;
            $retorno = false;

            while ($i < $cantClientes && !$retorno) {
                $elCliente = $colCliente[$i];
                $numCuentaCaja += 1;
                
                if ($elCliente -> getNroCliente() == $numeroCliente ) {
                    /* $cantCajaA = count($colCajaA) + 1; */


                    $nuevaCajaAhorro = new CajaAhorro($numCuentaCaja, 0, $elCliente);
                    $colCajaA[] = $nuevaCajaAhorro;
                    $this -> setColeccionCajaAhorro($colCajaA);
                    $retorno = true;
                }
                $i++;
            }
            return $retorno;
        }

        /** realizarDeposito(numCuenta,monto): Dado un número de Cuenta y un monto, realizar depósito.
         * @param int $numCuenta
         * @param float $monto
         * @return booleano $retorno
        */

        public function realizarDeposito($numCuenta, $monto){
            $colCtaCte = $this->getColeccionCuentaCorriente();
            $colCajaA = $this->getColeccionCajaAhorro();
            $colCompleta = array_merge($colCtaCte, $colCajaA);
            $cantColCompleta = count($colCompleta);
            $i = 0;
            $exito = false;
        
            while ($i < $cantColCompleta && !$exito) {
                $laCuenta = $colCompleta[$i];
                if ($laCuenta->getNumeroCuenta() == $numCuenta) {
                    $laCuenta->realizarDeposito($monto);

                    $exito = true;
                }
                $i++;
            }
            return $exito;
        }

        /** realizarRetiro(numCuenta,monto): Dado un número de Cuenta y un monto, realizar retiro.  
         * @param int $nunCuenta
         * @param float $monto
         * @return booleano $retorno;
        */
        public function realizarRetiro($numCuenta, $monto){
            $colCtaCte = $this->getColeccionCuentaCorriente();
            $colCajaA = $this->getColeccionCajaAhorro();
            $colCompleta = array_merge($colCtaCte, $colCajaA);
            $cantColCompleta = count($colCompleta);
            $i = 0;
            $exito = false;
        
            while ($i < $cantColCompleta && !$exito) {
                $laCuenta = $colCompleta[$i];
                if ($laCuenta->getNumeroCuenta() == $numCuenta) {
                    $laCuenta->realizarRetiro($monto);
                    $exito = true;
                }
                $i++;
            }
            return $exito;
        }
    }   


    

?>

