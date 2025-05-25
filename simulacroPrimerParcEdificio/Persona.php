<?php
    class Persona{
        private $tipoDoc;
        private $numDoc;
        private $nombre;
        private $apellido;
        private $telefono;


        public function __construct($tipoDoc, $numDoc, $nombre, $apellido, $telefono){
            $this->tipoDoc = $tipoDoc;
            $this->numDoc = $numDoc;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
        }

        public function getTipoDoc(){
            return $this->tipoDoc;
        }
        public function getNumDoc(){
            return $this->numDoc;
        }
        public function getNombre(){
            return $this->nombre;
        }       
        public function getApellido(){
            return $this->apellido;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setTipoDoc($tipoDoc){
            $this->tipoDoc = $tipoDoc;
        }
        public function setNumDoc($numDoc){
            $this->numDoc = $numDoc;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }   
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }       
              
            //Tostring
        public function __toString(){
                $mensaje = "Tipo de documento: " . $this -> getTipoDoc() . "\n";
                $mensaje .= "Numero de documento: " . $this -> getNumDoc() . "\n";
                $mensaje .= "Nombre: " . $this -> getNombre() . "\n";
                $mensaje .= "Apellido: " . $this -> getApellido() . "\n";
                $mensaje .= "Telefono: " . $this -> getTelefono() . "\n";
                return $mensaje;
        }
        
       
    }




?>