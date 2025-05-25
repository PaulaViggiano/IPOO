<?php
    class Persona {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $nombre;
        private $apellido;
        private $dni;
        private $direccion;
        private $email;
        private $telefono;
        private $neto;

        //METODO CONSTRUCTOR
        public function __construct($nombre, $apellido, $dni, $direccion, $email, $telefono, $neto) {
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> dni = $dni;
            $this -> direccion = $direccion;
            $this -> email = $email;
            $this -> telefono = $telefono;
            $this -> neto = $neto;

        }

        //METODO DE ACCESO GET AND SET
       //NOMBRE
        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;

        }

        //APELLIDO
        public function getApellido()
        {
                return $this->apellido;
        }

        public function setApellido($apellido)
        {
            $this->apellido = $apellido;

        }

        //DNI
        public function getDni()
        {
            return $this->dni;
        }

        public function setDni($dni)
        {
            $this->dni = $dni;

        }

        //DIRECCION
        public function getDireccion()
        {
            return $this->direccion;
        }
        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;

        }

        //email
        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;

        }

        //TELEFONO
        public function getTelefono()
        {
            return $this->telefono;
        }
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;

        }
        //NETO
        public function getNeto()
        {
            return $this->neto;
        }
        public function setNeto($neto)
        {
            $this->neto = $neto;

        }

        //METODO TOSTRING
        public function __tostring(){
            $mensaje = "\n*****************DATOS DEL CLIENTE******************\n";
            $mensaje .= "Nombre: " . $this -> getNombre() . "\n";
            $mensaje .= "Apellido: " . $this -> getApellido() . "\n";
            $mensaje .= "DNI: " . $this -> getDni() . "\n";
            $mensaje .= "Direccion: " .$this -> getDireccion() . "\n";
            $mensaje .= "Email: " . $this -> getEmail() . "\n";
            $mensaje .= "Telefono: " . $this -> getTelefono() . "\n";
            $mensaje .= "Neto: $" . $this -> getNeto() . ".-\n";
            $mensaje .= "****************************************************\n";
            return $mensaje;
        }
    }

?>