<?php
    class Cliente extends Persona {
        //ATRIBUTOS
        private $nroCliente;

        //METODO CONSTRUCTOR
        public function __construct($tipoDni, $dni, $nombre, $apellido, $nroCliente){
            parent::__construct($tipoDni ,$dni, $nombre, $apellido);
            $this -> nroCliente = $nroCliente;
        }

        //METODOS DE ACCESO GET Y SET
        public function setNroCliente($nroCliente){
            $this -> nroCliente = $nroCliente;
        }

        public function getNroCliente(){
            return $this -> nroCliente;
        }

        public function __toString(){
            
            $mensaje = parent::__toString();
            $mensaje .= "Numero de Cliente: " . $this -> getNroCliente() . "\n";
            

            return $mensaje;
        }
    }




?>