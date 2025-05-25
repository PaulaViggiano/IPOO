<?php
    class Teatro {
        //Variables instancia o atributos
        private $nombre;
        private $direccion;
        private $funciones; //Array asociativo donde voy a guardar las funciones y el precio.

        //Metodo contructor
        public function __construct($nombre, $direccion) {
            $this -> nombre = $nombre;
            $this -> direccion = $direccion;

            //Cargo un arreglo asociativo con las funciones disponibles del teatro
            $this -> funciones = [
                ["nombre" => "Obra de musica Clasica", "precio" => 1000],
                ["nombre" => "Musical infantil", "precio" => 800],
                ["nombre" => "Comedia Stand-up", "precio" => 1200],
                ["nombre" => "Concierto Sinfonico", "precio" => 1500]
            ];
        }

        //Metodo de acceso GET
        public function getNombre() {
            return $this -> nombre;
        }

        public function getDireccion() {
            return $this -> direccion;
        }

        public function getFunciones() {
            return $this -> funciones;
        }

        //Metedos de acceso SET
        public function setNombre($nombre) {
            $this -> nombre = $nombre;
        }

        public function setDireccion($direccion){
            $this -> direccion = $direccion;
        }

        //METODO PARA MODIFICAR POR INDICE 0-3
        /* Verifica que el índice de la función exista (isset($this->funciones[$indice])). 
         * Asegura que el precio sea mayor a 0. */
        public function setNombreFuncion($indice, $nombre) {//indice es la posicion
            if (isset($this -> funciones[$indice])) {
                $this -> funciones[$indice]["nombre"] = $nombre;
            }
        }

        public function setPrecioFuncion($indice, $precio){
            if (isset($this -> funciones[$indice]) && $precio > 0) {
                $this -> funciones[$indice]["precio"] = $precio;
            }
        }

        //Metodo toString para mostrar la infirmacion .= concatena las cadenas de texto manteniendo los saltos de linea
        public function __tostring(){
            $info = "Teatro: " . $this -> getNombre() . "\n";
            $info .= "Direccion: " . $this -> getDireccion() . "\n";
            $info .= "Funciones: \n";
            foreach ($this -> funciones as $i => $funcion) {
                $info .= " " . ($i + 1) . ")" . $funcion["nombre"] . " - \$" . $funcion["precio"] . "\n";
            }

            return $info;
        }


    }



?>