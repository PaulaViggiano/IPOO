<?php
    include_once 'Cuota.php';
    class Prestamo {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $identificacion;
        private $fecha_otorgamiento;
        private $monto;
        private $cantidad_de_cuotas;
        private $tasa_de_interes;
        private $coleccion_cuotas;
        private $obj_persona;

        //METODO CONSTRUCTOR
        public function __construct($identificacion, $monto, $cantidad_de_cuotas, $tasa_de_interes, $obj_persona){
            $this -> identificacion = $identificacion;
            $this -> fecha_otorgamiento = null;
            $this -> monto = $monto;
            $this -> cantidad_de_cuotas = $cantidad_de_cuotas;
            $this -> tasa_de_interes = $tasa_de_interes;
            $this -> coleccion_cuotas = [];
            $this -> obj_persona = $obj_persona;
        }

        //METODOS DE ACCESO GET Y SET
        //IDENTIFICACION
        public function getIdentificacion()
        {
            return $this->identificacion;
        }

        public function setIdentificacion($identificacion)
        {
            $this->identificacion = $identificacion;

        }

        //FECHA OTORGAMIENTO
        public function getFecha_otorgamiento()
        {
            return $this->fecha_otorgamiento;
        }

        public function setFecha_otorgamiento($fecha_otorgamiento)
        {
            $this->fecha_otorgamiento = $fecha_otorgamiento;

        }

        //MONTO
        public function getMonto()
        {
            return $this->monto;
        }

        public function setMonto($monto)
        {
            $this->monto = $monto;

        }

        //CANTIDAD DE CUOTAS
        public function getCantidad_de_cuotas()
        {
            return $this->cantidad_de_cuotas;
        }

        public function setCantidad_de_cuotas($cantidad_de_cuotas)
        {
            $this->cantidad_de_cuotas = $cantidad_de_cuotas;

        }

        //TAZA DE INTERES
        public function gettasa_de_interes()
        {
            return $this->tasa_de_interes;
        }

        public function settasa_de_interes($tasa_de_interes)
        {
            $this->tasa_de_interes = $tasa_de_interes;

        }

        //COLECCION CUOTAS
        public function getColeccion_cuotas()
        {
            return $this->coleccion_cuotas;
        }

        public function setColeccion_cuotas($coleccion_cuotas)
        {
            $this->coleccion_cuotas = $coleccion_cuotas;

        }

        //OBJETO PERSONA
        public function getObj_persona()
        {
            return $this->obj_persona;
        }

        public function setObj_persona($obj_persona)
        {
            $this->obj_persona = $obj_persona;

        }


        //METODOS DE LA CLASE
        /** Implementar el método privado calcularInteresPrestamo(numCuota) que recibe por parámetro el numero de la cuota
         *  y calcula el importe del interés sobre el saldo deudor. 
         * @param int $numCuota 
        */

        private function calcularInteresPrestamo($numCuota){
            
            $cantCuotas = $this -> getCantidad_de_cuotas();
            $monto = $this -> getMonto();
            $tasa = $this -> gettasa_de_interes();

                $saldoDeudor = $monto -(($monto / $cantCuotas) * ($numCuota - 1));
                $intereses = $saldoDeudor * $tasa;
        
            
            return $intereses;
           
        }


        //METODO OTORGAR PRESTAMO
        /** Implementar el método otorgarPrestamo que setea la variable instancia  fecha otorgamiento, 
         * con la fecha actual (puede utilizar el valor retornado por la función de PHP getdate())  
         * y genera cada una de las cuotas dependiendo el valor almacenado en la variable instancia  
         * “cantidad_de_cuotas” y monto.  El importe total de la cuota debe ser calculado de la siguiente manera:  
         * (monto / cantidad_de_cuotas ) y el monto correspondiente al interés debe ser el valor retornado por 
         * el método  calcularInteresPrestamo(numeroCuota) implementado en el inciso anterior.
        */  

        public function otorgarPrestamo() {
            $fecha = $this -> getFecha_otorgamiento();
            $fecha = date("Y-M-D");
            $this -> setFecha_otorgamiento($fecha);
            $coleccionC = $this -> getColeccion_cuotas();
            $monto = $this -> getMonto();
            $cantCuotas = $this -> getCantidad_de_cuotas();
            $montoPorCuota = $monto / $cantCuotas;

            for ($i=1; $i <= $cantCuotas; $i++) { 
                $intereses = $this -> calcularInteresPrestamo($i);//Traigo el metodo anterior Interes de la cuota en $i
                $cuota = new Cuota($i, $montoPorCuota, $intereses, false);
                array_push($coleccionC, $cuota);
                $this -> setColeccion_cuotas($coleccionC);
            }


        }

        /** Implementar el método darSiguienteCuotaPagar método que retorna la referencia a la siguiente cuota que 
         * debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas retorna null.
         * @param float
        */  
        public function darSiguienteCuotaPagar(){
            $respuesta = null;
            foreach ($this -> getColeccion_cuotas() as $cuota) {
                if (!$cuota -> getCacelada()) {
                    $respuesta = $cuota;
                }
            }

            return $respuesta;


            
        }

        /* Indica si el prestamo ya fue otorgado (Tiene cuotas generadas) retorna un booleano */

        public function estaOtorgado() {

            $tieneCuotas = $this -> getColCuotas();
            $otorgado = false;

            if ($tieneCuotas) {
                $otorgado = true;
            }
            return $otorgado;

        }



        //METODO TOSTRING
        public function __toString(){

            $this -> otorgarPrestamo();
            $mensaje = "**************PRESTAMO**************\n";
            $mensaje .= "Identificacion: " . $this -> getIdentificacion() . "\n";
            $mensaje .= "Fecha otorgamiento: " . $this -> getFecha_otorgamiento() . "\n";
            $mensaje .= "Monto: $" . $this -> getMonto() . ".-\n";
            $mensaje .= "Cantidad cuotas: " . $this -> getCantidad_de_cuotas() . "\n";
            $mensaje .= "Tasa interes: " . $this -> gettasa_de_interes() * 100 . "%\n";
            
            foreach ($this -> getColeccion_cuotas() as $cuota ) {
                
                $mensaje .= "Cuota: " . $cuota -> getNumero()  . ": $" . $cuota -> darMontoFinalCuota() .".-\n";
            }

            $mensaje .= $this -> getObj_persona() . "\n";
            $mensaje .= "****************************************************\n";
            
            return $mensaje;
        }
    }



?>