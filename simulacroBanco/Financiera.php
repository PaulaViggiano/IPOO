<?php
    class Financiera{
        //Variables Instancia - Atributos
        private $denominacion;
        private $direccion;
        private $col_prestamos_otorgados;

        public function __construct($denominacion, $direccion){
            $this -> denominacion = $denominacion;
            $this -> direccion = $direccion;
            $this -> col_prestamos_otorgados = [];
        }

        //Metodos de acceso GET Y SET
        public function setDenominacion($denominacion){
            $this -> denominacion = $denominacion;
        }

        public function getDenominacion(){
            return $this -> denominacion;
        }

        public function setDireccion($direccion){
            $this -> direccion = $direccion;
        }

        public function getDireccion(){
            return $this -> direccion;
        }

        public function setCol_prestamos_otorgados($col_prestamos_otorgados){
            $this -> col_prestamos_otorgados = $col_prestamos_otorgados;
        }
        public function getCol_prestamos_otorgados(){
            return $this -> col_prestamos_otorgados;
        }

        /** Implementar  el método incorporarPrestamo  que recibe por parámetro un nuevo préstamo 
         * @param obj $prestamo
        */
        public function incorporarPrestamo($prestamo){
            $coleccionPrestamos = $this -> getCol_prestamos_otorgados(); //Obtiene la coleccion ACTUAL de prestamos
            $coleccionPrestamos[] = $prestamo;//Anade el nuevo prestamo
            $this -> setCol_prestamos_otorgados($coleccionPrestamos); //Actualiza la coleccion
        }

        /** Implementar el método otorgarPrestamoSiCalifica, método que recorre la lista de préstamos que
         *  no han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la
         *  cantidad_de_cuotas no supere  el 40 % del neto del solicitante,
         *  si la verificación es satisfactoria se invoca al método otorgarPrestamo. 
         * 
        */  
        public function otorgarPrestamoSiCalifica(){
            foreach ($this -> getCol_prestamos_otorgados() as $prestamo) {//Hago un foreach para recorrer toda la coleccion de prestamos
                if (!$prestamo -> estaOtorgado()) {
                    $monto = $prestamo -> getMonto();
                    $cuotas = $prestamo -> getCantidad_de_cuotas();
                    $solicitante = $prestamo -> getObj_persona();

                    /* Calcular 40% del neto del solicitante */
                    $limite = $solicitante -> getNeto() * 0.4;

                    //Valor de la cuota
                    $valorCuota = $monto / $cuotas;

                    //Verifico si la cuota es menor o igual al limite
                    if ($valorCuota <= $limite) {
                        $prestamo -> otorgarPrestamo();
                    }
                }
            }
        }

        /** Implementar el método darSiguienteCuotaPagar método que retorna la referencia a la siguiente
         * cuota que debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas 
         * retorna null. */

         public function informarCuotaPagar($idPrestamo) {
            $cuotaApagar = null;

            foreach ($this -> getCol_prestamos_otorgados() as $prestamo) {
                if ($prestamo -> getIdentificacion() == $idPrestamo) {
                    $cuotaApagar = $prestamo -> darSiguienteCuotaPagar();
                }
            }

            return $cuotaApagar;
         }


         //Metodo tostring

         public function __toString() {
            
            $mensaje = "*******************FINANCIERA**********************\n";
            $mensaje .= "Denominacion: " . $this -> getDenominacion() . "\n";
            $mensaje .= "Direccion: " . $this -> getDireccion() . "\n";  
            $mensaje .= "Prestamos otorgados: \n";  
            
            foreach ($this -> getCol_prestamos_otorgados() as $prestamo) {
                $mensaje .= $prestamo . "\n"; //PRESTAMO TIENE SU TOSTRING
            }

            $mensaje .= "**********************************************";
            return $mensaje;
         }


    }




?>