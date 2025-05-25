<?php
    class Inmueble {
        //Variables instancia o atributos
        private $codigoReferencia;
        private $numeroDePiso;
        private $tipoInmueble;
        private $costoMensual;
        private $objPersona;

        //Metodo constructor
        public function __construct($codigoReferencia, $numeroDePiso, $tipoInmueble, $costoMensual, $objPersona) {
            $this->codigoReferencia = $codigoReferencia;
            $this->numeroDePiso = $numeroDePiso;
            $this->tipoInmueble = $tipoInmueble;
            $this->costoMensual = $costoMensual;
            $this->objPersona = $objPersona;
        }

        //Getters
        public function getCodigoReferencia() {
            return $this->codigoReferencia;
        }   
        public function getNumeroDePiso() {
            return $this->numeroDePiso;
        }
        public function getTipoInmueble() {
            return $this->tipoInmueble;
        }
        public function getCostoMensual() {
            return $this->costoMensual;
        }
        public function getObjPersona() {
            return $this->objPersona;
        }
        //Setters
        public function setCodigoReferencia($codigoReferencia) {
            $this->codigoReferencia = $codigoReferencia;
        }
        public function setNumeroDePiso($numeroDePiso) {
            $this->numeroDePiso = $numeroDePiso;
        }
        public function setTipoInmueble($tipoInmueble) {
            $this->tipoInmueble = $tipoInmueble;
        }
        public function setCostoMensual($costoMensual) {
            $this->costoMensual = $costoMensual;
        }
        public function setObjPersona($objPersona) {
            $this->objPersona = $objPersona;
        }
        //Metodo toString
        public function __toString() {
            $mensaje = "Codigo de referencia: " . $this->getCodigoReferencia() . "\n";
            $mensaje .= "Numero de piso: " . $this->getNumeroDePiso() . "\n";
            $mensaje .= "Tipo de inmueble: " . $this->getTipoInmueble() . "\n";
            $mensaje .= "Costo mensual: " . $this->getCostoMensual() . "\n";
            $mensaje .= "Datos del propietario: \n" . $this->getObjPersona();//Cuando llamo a getObjPersona, me devuelve un objeto de la clase Persona, por lo que se llama al metodo toString de la clase Persona
            $mensaje .= "----------------------------------------\n";
            return $mensaje;
        }

        /** Implementar el método alquilarInmueble(objPersona) el cual recibe por parámetro la 
         * referencia al nuevo inquilino del inmueble. Tener en cuenta que un inmueble solo 
         * puede ser alquilado si no se encuentra alquilado en ese momento.
         * @param Persona $objPersona
         * 
        */  

        public function alquilarInmueble($objPersona) {
            if ($this -> getObjPersona() == null) { //Si objPersona es null entonces agrego el objPersona con setPersona
                $this -> setObjPersona($objPersona);
            }
        }



    }




?>