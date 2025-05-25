<?php

    class Disquera {

        //Creo los atributos / variables instancia, en privado
        private $hora_desde;
        private $hora_hasta;
        private $estado;
        private $direccion;
        private $obj_duenio;// hace referencia al objeto persona

        //Metodo constructor
        public function __construct($abre, $cierra, $estado, $dir_disquera, $obj_persona ) {
            $this -> hora_desde = $abre;
            $this -> hora_hasta = $cierra;
            $this -> estado = $estado;
            $this -> direccion = $dir_disquera;
            $this -> obj_duenio = $obj_persona;

        }

        //Set guarda los valores en los atributos o variables instancia.

        public function setHoraDesde($abre) {
            $this -> hora_desde = $abre;
        }

        public function setHoraHasta($cierra) {
            $this -> hora_hasta = $cierra;
        }

        public function setEstado($estado) {
            $this -> estado = $estado;
        }

        public function setDireccion($dir_disquera) {
            $this -> direccion = $dir_disquera;
        }

        public function setObj_duenio($obj_persona) {
            $this -> obj_duenio = $obj_persona;
        }

        //GET trae la informacion de las variables de instancia o atributos
        public function getHora_desde() {
            return $this -> hora_desde;
        }

        public function getHora_hasta() {
            return $this -> hora_hasta;
        }

        public function getEstado() {
            return $this -> estado;
        }

        public function getDireccion() {
            return $this -> direccion;
        }

        public function getObj_duenio() {
            return $this -> obj_duenio;
        }

        /* Completar con consigna y parametros */

        public function dentroHorarioAtencion($hora, $minutos) {
            //Esta variable va a convertir todas las horas en minutos para poder hacer las comparaciones necesarias sin tener que usar una funcion propia de php
            $horaEnMinutos = $hora * 60 + $minutos;

            $horaAperturaEnMinutos = $this -> getHora_desde() * 60;
            $horaCierreEnMinutos = $this -> getHora_hasta() * 60;

            if ($horaAperturaEnMinutos <= $horaCierreEnMinutos) {
                # code...
            }
            
        }

        /* Completar */

        public function abrirDisquera($hora, $minutos) {
            $resp = false;
           if ($this -> dentroHorarioAtencion($hora, $minutos)) {
                $this -> setEstado("Abierto");
                $resp = true;
           }

           return $resp;
            
        }

        /* Completar */

        public function cerrarDisquera($hora, $minutos){
            $resp = false;
          //En esta comparacion corroboro si el horario de atencion es true o false segun la funcion dentro de Horario de atencion
            if (! ($this -> dentroHorarioAtencion($hora, $minutos))) {
                
                $this -> setEstado("Cerrado");//Seteo el mensaje de que esta cerrado;
                $resp = true;
            }

            return $resp;
            
        }

        /* Completar */

        public function __toString() {
            return "La Disquera se encuentra en: " . $this -> getDireccion() . "\n el horario de atencion es " . $this -> getHora_desde() . " hasta las " . $this -> getHora_hasta() . " horas";
        }






    }


?>