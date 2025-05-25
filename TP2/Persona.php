<?php

    class Persona {
        //atributos o variables instancias;
        private $nombre;
        private $apellido;
        private $tipoDoc;
        private $numDoc;

        //Constructor para crear la nueva instancia u objeto
        public function __construct($name, $surname, $typeDoc, $numberDoc){
            $this -> nombre = $name;
            $this -> apellido = $surname;
            $this -> tipoDoc = $typeDoc;
            $this -> numDoc = $numberDoc;

        }

        //Metodo de acceso SET
        public function setNombre($name) {
            $this -> nombre = $name;
        }

        public function setApellido($surname) {
            $this -> apellido = $surname;
        }

        public function setTipoDoc($typeDoc) {
            $this -> tipoDoc = $typeDoc;
        }

        public function setNumDoc($numberDoc) {
            $this -> numDoc = $numberDoc;
        }

        //Metodo de acceso GET;
        public function getNombre(){
            return $this -> nombre;
        }

        public function getApellido(){
            return $this -> apellido;
        }

        public function getTipoDoc() {
            return $this -> tipoDoc;
        }

        public function getNumeroDoc() {
            return $this -> numDoc;
        }

        //Muestra una cadena de caracteres utilizando el metodo de acceso GET para traer la infirmacion guardada dentro de la instancia
        public function __toString() {
            return "Nombre: " . $this -> getNombre() . "\n Apellido: " . $this -> getApellido() ."\n Tipo de documento: " . $this -> getTipoDoc() . "\n Numero: " . $this -> getNumeroDoc() . "\n";
        }



    }









?>