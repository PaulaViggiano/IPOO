<?php
    class Agencia {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $colPaquetesTuristicos;
        private $colVentasAgencia;
        private $colVentasOnline;

        //CONSTRUCTOR
        public function __construct() {
            $this -> colPaquetesTuristicos = [];
            $this -> colVentasAgencia = [];
            $this -> colVentasOnline = [];

        }

        //METODOS DE ACCESO GET Y SET
        public function getColPaquetesTuristicos() {
            return $this -> colPaquetesTuristicos;
        }
        public function setColPaquetesTuristicos($colPaquetesTuristicos) {
            $this -> colPaquetesTuristicos = $colPaquetesTuristicos;
        }
        public function getColVentasAgencia() {
            return $this -> colVentasAgencia;
        }
        public function setColVentasAgencia($colVentasAgencia) {
            $this -> colVentasAgencia = $colVentasAgencia;
        }
        public function getColVentasOnline() {
            return $this -> colVentasOnline;
        }
        public function setColVentasOnline($colVentasOnline) {
            $this -> colVentasOnline = $colVentasOnline;
        }

        //METODO TOSTRING
        public function __toString() {
            $mensajePaquetes = "";
            $colPaquetes = $this -> getColPaquetesTuristicos();
            foreach ($colPaquetes as $paquete) {
                $mensajePaquetes .= $paquete . "\n";
            }

            $mensajeAgencia = "";
            $colAgencia = $this -> getColVentasAgencia();
            foreach ($colAgencia as $venta) {
                $mensajeAgencia .= $venta . "\n";
            }

            $mensajeOnline = "";
            $colOnline = $this -> getColVentasOnline();
            foreach ($colOnline as $venta) {
                $mensajeOnline .= $venta . "\n";
            }

            $mensaje = "\n------Agencia------\n";
            $mensaje .= $mensajePaquetes . "\n";
            $mensaje .= $mensajeAgencia . "\n";
            $mensaje .= $mensajeOnline . "\n";

            return $mensaje;
        }

        /** incorporarPaquete(objPaqueteTuristico) :que incorpora a la colección de paquetes turísticos un
         *nuevo paquete a la agencia siempre y cuando no haya un paquete en la misma fecha al mismo
         *destino. Si el paquete pudo ser ingresado el método debe retornar true y false en caso contrario.
         *@param Object $objPaqueteTuristico
         *@return booleano $ingresado 
        */

        public function incorporarPaquete($objPaqueteTuristico){
            $ingresado = false;//Variable de retorno
            $i = 0;//Variable iteradora para recorrer las posiciones del arreglo
            $viaje = $this -> getColPaquetesTuristicos();//Coleccion de pasajes turisticos
            $cantViajes = count($viaje);
            $seEcnontro = false;//Variable booleana para detener el ciclo en caso de encontrar el destino
            /* Obtengo los datos del objeto paquete turistico para comparar y saber si puedo agregar a la coleccion */
            $destinoObj = $objPaqueteTuristico -> getObjDestino() -> getNombre();//destino del objeto
            $fechaObj = $objPaqueteTuristico -> getFechaDesde();//fecha del objeto

            while ($i < $cantViajes && !$seEcnontro) {
                $destino = $viaje[$i] -> getObjDestino() -> getNombre(); //Guardo el nombre del destino
                $fecha = $viaje[$i] -> getFechaDesde();//Guardo la fecha del viaje

                if ($destinoObj == $destino && $fechaObj == $fecha) {
                    $seEncontro = true;
                }

                $i++;
            }

            if ($seEcnontro == false) {
                
                $viaje[] = $objPaqueteTuristico;//Agrego el objeto a la coleccion paquetes turisticos
                $this -> setColPaquetesTuristicos($viaje);//Seteo el arreglo
                $ingresado = true;//modifico la variable de retorno a verdadero para avisar que se cargo el obj al arreglo
            }

            return $ingresado;
        }

        /** incorporarVenta(objPaquete,tipoDoc,numDoc,cantPer, esOnLine): método que recibe por parámetro
         * el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el
         * paquete turístico y si se trata o no de una venta on-line (valor true o false). El método retorna el
         * importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso
         * contrario. 
         * @param object $objPaquete
         * @param string $tipoDoc
         * @param int $numDoc
         * @param int $cantPer
         * @param booleano $esOnline
         * @return float $importeFinal
        */
        public function incorporarVenta($objPaquete, $tipoDoc, $numDoc, $cantPer, $esOnline){
            
            $retornoVenta = -1;//Variable de retorno, si no realiza la venta devuelve -1
            $ventaAgencia = $this -> getColVentasAgencia();//obtengo la coleccion de ventas de la agencia
            $ventaOnline = $this -> getColVentasOnline();//obtengo la col de ventas online
            
            /* Necesito la cantidad de plazas disponibles para saber si se puede vender el paquete */
            $cantPlazasDisponibles = $objPaquete -> getCantPlazasDisponibles();

            /* Creo la fecha actual de venta */
            $fechaActual = new DateTime();
            $fechaVenta = $fechaActual -> format('Y-M-D');

            /* Creo un nuevo Cliente para mandar por parametros a la nueva venta*/
            $cliente = new Cliente($tipoDoc, $numDoc, "Paula", "Viggiano", 1234);
            
            /* Si la venta es online ingresa en el if*/
            if($esOnline && $cantPlazasDisponibles > $cantPer) {
                /* Calculo las plazas que quedan disponibles y seteo la nueva cantidad */
                $plazasDispo = $cantPlazasDisponibles - $cantPer;
                $objPaquete -> setCantPlazasDisponibles($plazasDispo);

                /* Genero una nueva venta y la agrego a la coleccion de Ventas Online y lo guardo */
                $ventaOnline = new OnLine($fechaVenta, $objPaquete, $cantPer, $cliente);//Genero
                $ventaOnlineCol[] = $ventaOnline;//agrego a la ultima posicion
                $this -> setColVentasOnline($ventaOnlineCol);//guardo en el arreglo
                $retornoVenta = $ventaOnline -> darImporteVenta();

            } elseif (!$esOnline && $cantPlazasDisponibles > $cantPer) {
                /* Calculo las plazas que quedan disponibles y seteo la nueva cantidad */
                $plazasDispo = $cantPlazasDisponibles - $cantPer;
                $objPaquete -> setCantPlazasDisponibles($plazasDispo);

                /* Genero una nueva venta y la agrego a la coleccion de Ventas Online y lo guardo */
                $venta = new Venta($fechaVenta, $objPaquete, $cantPer, $cliente);//Genero
                $ventaAgencia[] = $venta;//agrego a la ultima posicion
                $this -> setColVentasAgencia($ventaAgencia);//guardo en el arreglo
                $retornoVenta = $venta -> darImporteVenta();
            }
            return $retornoVenta;
        }

        /** informarPaquetesTuristicos(fecha,destino): método que retorna una colección con todos los
         *paquetes que se realizan en una fecha y a un destino. ME ENVIAN UN OBJ DESTINO POR PAR
         *@param string $fecha
         *@param object $destino
         *@return array $coleccionPaquetes
        */

        public function informarPaquetesTuristicos($fecha, $destino){
            $colPaquetes = $this -> getColPaquetesTuristicos();//Obtengo la coleccion de Paquetes Turisticos
            $colRetornoPaquetes = [];//Inicializo un arreglo vacio para retorno
            $objDestinoNombre = $destino -> getNombre();//Obtengo el nombre del destino por el objeto que me envian por parametros
            
            foreach ($colPaquetes as $paquete) {
                $fechaPaquete = $paquete -> getFechaDesde();//Obtengo la fecha del viaje
                $nomDestino = $paquete -> getObjDestino() -> getNombre();//Obtengo el nombre del destino

                if ($fechaPaquete == $fecha && $nomDestino == $objDestinoNombre) {
                    $colRetornoPaquetes[] = $paquete;//guardo los objetos en el arreglo
                }

            }
            return $colRetornoPaquetes;//retorno
        }

        /** paqueteMasEcomomico(fecha,destino): método que retorna el paquete turístico mas económico 
         * para una fecha y un destino. 
         * @param string $fecha
         * @param object $destino
         * @return object $paqueteMasBarato
        */

        public function paqueteMasEconomico($fecha, $destino){
            /* Llamo a la funcion informarPaquetesTuristicos($fecha, $destino) destino es un objeto */
            $infoDestinos = $this -> informarPaquetesTuristicos($fecha, $destino);//Obtengo un arreglo

            /* declaro variables para guardar la informacion del valor del paquete y el valor mas barato */
            $valorMasBarato = null;
            $paqueteMasBarato = null;

            /* Hago un foreach para recorrer el arreglo obtenido de la funcion anterior */
            foreach ($infoDestinos as $info) {
                $elDestino = $info -> getNombre();//Obtengo el nombre del destino
                $elValorDia = $elDestino -> getValorDia();//Obtengo el valor por dia

                /* Comparo los valores y guardo el valor mas barato */
                if ($paqueteMasBarato === null || ($valorMasBarato != null && $elValorDia < $valorMasBarato)) {
                   //Asigno el valor del paquete mas barato
                    $paqueteMasBarato = $info;
                    $valorMasBarato = $elValorDia;
                }
            }
            return $paqueteMasBarato;//Retorno el paquete mas barato
        }

        /** informarConsumoCliente(tipoDoc,numDoc): método que retorna todos los paquetes que fueron utilizados
         * por la persona identificada con el tipoDoc y numDoc recibidos por parámetro. 
         * @param string $tipoDoc
         * @param int $numDoc
         * @return array $paquetesCliente
        */

        public function informarConsumoCliente($tipoDoc, $numDoc){
            //Obtengo la coleccion de ventas y ventas Online que tiene el objeto cliente y las uno con un array_merge
            $ventasCol = $this -> getColVentasAgencia();
            $ventasOnline = $this -> getColVentasOnline();
            $ventasCompletas = array_merge($ventasCol, $ventasOnline);//Armo un solo arreglo con las dos colecciones
            $consumoCliente = [];//Arreglo vacio para cargar los datos y retornar

            //forEach para armar la coleccion de retorno
            foreach ($ventasCompletas as $venta) {
                $objCliente = $venta -> getObjCliente();
                $objTipoDni = $objCliente -> getTipoDni();
                $objNumDoc = $objCliente -> getDNI();

                if ($tipoDoc === $objTipoDni && $numDoc === $objNumDoc) {
                    $consumoCliente[] = $venta;
                }
            }

            return $consumoCliente;

        }

        /** informarPaquetesMasVendido(anio, n): retorna los n paquetes turísticos mas vendido en el
         * año recibido por parámetro. 
         *@param string $anio
         *@param int $n
         *@return array $paquetesMasVendidos
        */


        /** promedioVentasOnLine(): método que retorna el promedio de ventas on-line realizadas por la
         *agencia 
         *@return float $promedioOnline
        */
        public function promedioVentasOnline(){
            $ventasOnline = $this -> getColVentasOnline();//Obtengo la coleccion de ventas online
            $cantVentas = count($ventasOnline);//Voy a guardar la cantidad de ventas para sacar el promedio
            $ventas = 0;//Inicializo el promedio en 0
            $promedioOnline = null;

            /* ForEach para ir sumando y calcular el promedio */
            foreach ($ventasOnline as $venta) {
                $ventas += $venta -> darImporteVenta();//Voy sumando el precio de las ventas
            }

            if ($ventas > 0) { //Verifico que las ventas sean mayor a cero para que no de error
                $promedioOnline = $ventas / $cantVentas;
            }

            return $promedioOnline;
        }

        /** promedioVentasAgencia(): método que retorna el promedio de ventas on-line realizadas por la
         *agencia 
         *@return float $promedioVentas
        */
        public function promedioVentasAgencia(){
            //Obtengo la coleccion de ventas de la agencia
            $ventasAgencia = $this -> getColVentasAgencia();
            $cantVentasagencia = count($ventasAgencia);//Obtengo la cantidad total de ventas
            $ventas = 0; //Inicializo en cero para ir sumando el valor de todas las ventas
            $promedioAgencia = null;

            /* ForEach para ir sumando el valor de todas las ventas */
            foreach ($ventasAgencia as $venta) {
                $ventas += $venta -> darImporteVenta();
            }

            /* Verifico que las ventas sean mayor a cero para que no de error, en tal caso devuelvo null */
            if ($ventas > 0) {
                $promedioAgencia = $ventas / $cantVentasagencia;
            }

            return $promedioAgencia;
        }
    }   



?>