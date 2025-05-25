<?php
    class Login {
        //Atributos o variables instancia
        private $nombreUsuario;
        private $contrasenia;
        private $fraseContraIngresada;
        private $ultimasContrasenias;//Almeceno las ultimas 4 contrasenias, no es necesario [] ES UN ARREGLO

        //Metodo Constructor, crea al objeto o instancia
        public function __construct($nomUsuario, $pass, $fraseContrasenia) {
             
            $this -> nombreUsuario = $nomUsuario;
            $this -> contrasenia = $pass;
            $this -> fraseContraIngresada = $fraseContrasenia;
            $this -> ultimasContrasenias = array();//inicializo el array vacio
            

        }

        //METODO DE ACCESO GET - TRAE LOS VALORES DE LOS ATRIBUTOS O VARIABLES INSTANCIA
        public function getNombreUsuario(){
            return $this -> nombreUsuario;

        }

        public function getContrasenia(){
            return $this -> contrasenia;
        }

        public function getFraseContraIngresada(){
            return $this -> fraseContraIngresada;
        }

        public function getUltimasContrasenias() {
            return $this -> ultimasContrasenias;
        }

        //METODO DE ACCESO SET - GUARDA LOS VALORES EN LAS VARIABLES INSTANCIA / ATRIBUTOS
        public function setNombreUsuario($nomUsuario) {
            $this -> nombreUsuario = $nomUsuario;
        }

        public function setContrasenia($pass) {
            $this -> contrasenia = $pass;
        }

        public function setFraseContraIngresada($fraseContrasenia){
            $this -> fraseContraIngresada = $fraseContrasenia;

        }

        public function setUltimasContrasenias($ultimasCuatroPass){ //ultimasCuatroPass es el arreglo que se guarda en $ultimasContrasenias
            $this -> ultimasContrasenias = $ultimasCuatroPass;
        }


        /* ------------------------------------------------------------------------------------ */
        //Comienzan los metodos de la clase
        /** Implementar un método que permita validar una contraseña con la almacenada 
         * @param int $password
         * @return booleano - $respuesta
        */
        public function validarContrasenia($password){
            $respuesta = false; 
            $contraseniaActual = $this -> getContrasenia();//Guardo el valor de la contrasenia guardada por el usuario para compararla con la ingresada por teclado
            
            if ($contraseniaActual == $password) {
                $respuesta = true;
            } 

            return $respuesta;
        }

        /** un método para cambiar la contraseña actual por otra 
            *nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es 
            *decir no se encuentra dentro de las cuatro almacenadas)
            *@param int $passw
            *@return booleano $existe
         */

        public function verificaParaCambio($cambiarPass){//Esta fn verifica si la contrasenia coincide con alguna de las guardadas en el arreglo

            $existe = false;//Booleano para ver si existe o no la contrasenia en el arreglo
            $arregloPass = $this -> getUltimasContrasenias();//Guardo el arreglo de las ultimas 4 contrasenias
            $i = 0;

            while ($i < count($arregloPass) && !$existe) {
                
                if ($arregloPass[$i] == $cambiarPass) {
                    $existe = true;
                }

                $i += 1;
            }

            return $existe;


        }

        public function cambiarPass($unaPass, $nuevaPass){
            $cambio = false;

            if ($this -> validarContrasenia($unaPass)) {
                //verifico si la nueva contrasenia esta o no en el historial
                if (! $this -> verificaParaCambio($nuevaPass)) {
                    
                    //agregar contrasenia actual al array
                    array_unshift($this -> ultimasContrasenias, $this -> contrasenia);

                    //limitar el historial a 4 elementos
                    if (count($this -> getUltimasContrasenias()) > 4) {
                        //array_pop elimina el ultimo elemento para que el arreglo se mantenga en 4
                        array_pop($this -> ultimasContrasenias);

                    }
                    //Actualiza contrasenia
                    $this -> setContrasenia($nuevaPass);
                    $cambio = true;

                }
            }

            return $cambio;
        }

        /** Implementar el método recordar que dado el usuario, muestra la frase que permite recordar su contraseña. 
         * @return string devuelve la frase 
        */

        public function recordar($nombre) {
            $frase = "";
            $usuario = $this -> getNombreUsuario();

            if ($usuario == $nombre) {
                $frase = $this -> getFraseContraIngresada();
            }

           return "La frase es: " . $frase . " \n"; 
        }

        public function __toString(){
            return "El nombre de usuario es: " . $this -> getNombreUsuario() . "\n la contrasenia es: " . $this -> getContrasenia() . "\n la frase ingresada es: " . $this -> getFraseContraIngresada() ;
        }



    }




?>