<?php
    class Edificio {
        //Atributos
        private $direccion;
        private $coleccionDepartamento;
        private $administradorEdificio;//Hace referencia a una instancia persona

        public function __construct($direccion, $coleccionDepartamento, $administradorEdificio) {
            $this -> direccion = $direccion;
            $this -> coleccionDepartamento = $coleccionDepartamento;
            $this -> administradorEdificio = $administradorEdificio;
        }
        
        public function setDireccion($direccion) {
            $this -> direccion = $direccion;
        }
        public function setColeccionDepartamento($coleccionDepartamento) {
            $this -> coleccionDepartamento = $coleccionDepartamento;
        }
        public function setAdministradorEdificio($administradorEdificio) {
            $this -> administradorEdificio = $administradorEdificio;
        }
        public function getDireccion() {
            return $this -> direccion;
        }
        public function getColeccionDepartamento() {
            return $this -> coleccionDepartamento;
        }
        public function getAdministradorEdificio() {
            return $this -> administradorEdificio;
        }

        public function __tostring(){
            $mensaje = "\n*****************************\n";
            $mensaje .= "Lista de inmuebles: \n";
            $i = 0;

            foreach ($this -> getColeccionDepartamento() as $departamento) {
                $mensaje .= "Inmueble " . $i + 1 . "\n" . $departamento . "\n";
                $i++;
            }
            
            return "Direccion: " . $this -> getDireccion() . "\n" .     
                $mensaje . "\n" . $this -> getAdministradorEdificio() . "\n";
            
        }

        /** Implementar el método darInmueblesDisponiblesParaAlquiler(unTipoInmueble,costoMensual) 
         * método que retorna una colección de todos los departamentos del tipo recibido por parámetro 
         * (unTipoInmueble) que se encuentran disponibles para ser alquilados y cuyo costo mensual 
         * no supera el valor recibido en el parámetro costoMensual.  
         * @param String $unTipoInmueble
         * @param Float $costoMensual 
         * @return Array $inmueblesDisponibles
        */

        public function darInmueblesDisponiblesParaAlquiler($unTipoInmueble, $costoMensual){
            $inmueblesDisponibles = []; //Con este arreglo muestro los inmuebles disponibles para el alquiler que cumplan las condiciones pasadas por parametros
            
            foreach ($this -> getColeccionDepartamento() as $inmueble) {
              if (($inmueble -> getTipoInmueble() == $unTipoInmueble) && ($inmueble -> getCostoMensual() <= $costoMensual)) {
                    if($inmueble -> getObjPersona() == null) {
                    $inmueblesDisponibles[] = $inmueble;
                    }

    
                }
            }
            return $inmueblesDisponibles;

        }

        /** Implementar el método registrarAlquilerInmueble(objInmueble, objPersona) que recibe por 
         * parámetro una referencia al inmueble que se desea alquilar y la referencia a la persona que 
         * se desea alquilar. Tener en cuenta que solo se va a poder realizar el alquiler de dicho 
         * inmueble si verifica la política de alquiler de la empresa. El método debe retornar verdadero en caso de 
         * poder registrar el alquiler o falso en caso contrario.
         * @param object $objInmueble
         * @param object $objPersona
         * @return booleano
        */  

        public function registrarAlquilerInmueble($objInmueble, $objPersona) {
            $disponible = false;//variable de retorno
            $i = 0;//es para ir comparando cada posicion 
            $tipoDepto = $objInmueble -> getTipoInmueble();//Guardo el tipo que me ingresa por parametros
            $pisoDepto = $objInmueble -> getNumeroDePiso();//Numero de piso
            $colDisponible = $this -> getColeccionDepartamento();//Arreglo de inmuebles
            $cantDeptos = count($this -> getColeccionDepartamento());//cantidad de inmuebles
            if ($objInmueble -> getObjPersona() !== null){ //En objInmueble tengo a el objeto persona que viene de inmueble
                $disponible = true;//El departamento esta disponible
            } else {
                do {
                    $inmueble = $colDisponible[$i]; // Estoy guardando en inmueble en la posicion cero en principio
                    if ($inmueble -> getTipoInmueble() == $tipoDepto && $inmueble -> getNumeroDePiso() < $pisoDepto && $inmueble -> getObjPersona() == null) {
                        $disponible = true;//es porque esta declarada como verdadera
                    }
                    $i++;
                   
                } while ($i < $cantDeptos && $disponible != true);

            }
            if ($disponible) {//si disponible es verdadero
                $objInmueble -> alquilarInmueble($objPersona);//Como tengo que setear un inquilino llamo a la funcion de inmueble y lo guardo
            }

            return $disponible;            
        }

        /** Implementar el método calculaCostoEdificio() método que retorna el valor correspondiente a 
         * la suma de los costos de cada uno de los inmuebles que se encuentran alquilados.
         * @return float $costoTotal
        */  

        public function calculaCostoEdificio(){
            $colDepartamentos = $this -> getColeccionDepartamento();//Guardo la coleccion de departamentos
            $costoTotal = 0;//Inicializo la variable de retorno en cero. Aca voy a guardar la suma del valor del costo mensual total
            
            foreach ($colDepartamentos as $inmueble) {//Recorre la coleccion de inmuebles 
                if ($inmueble -> getObjPersona() !== null) {//Verifica si el inmueble esta o no alquilado
                    $costoTotal += $inmueble -> getCostoMensual(); //Suma el valor mensual de los inmuebles alquilados
                }
                
            }
            return $costoTotal;
        }


    }


?>