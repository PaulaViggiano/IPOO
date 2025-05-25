<?php

    class Lectura {

        //Variables instancia - atributos
        private $objLibro;
        private $paginaActual;
        private $librosLeidos;

        //Metodo para crear instancias - objetos
        public function __construct($objLibro, $paginaActual) {
           
            $this -> objLibro = $objLibro;
            $this -> paginaActual = $paginaActual;
            $this -> librosLeidos = []; //Inicializo el arreglo vacio de los libros leidos
        }

        //Metodo de acceso GET
        public function getObjLibro() {
            return $this -> objLibro;
        }

        public function getPagActual() {
            return $this -> paginaActual;
        }

        public function getLibrosLeidos() {
            return $this -> librosLeidos;
        }

        //Metodo de acceso SET
        public function setObjLibro($objLibro) {
            $this -> objLibro = $objLibro;
        }

        public function setPagActual($paginaActual) {
            $this -> paginaActual = $paginaActual;
        }

        public function setLibrosLeidos($librosLeidos) {
            $this -> librosLeidos = $librosLeidos;
        }

        //Metodos de la clase
        /* siguientePagina(): método que retorna la página del libro y actualiza la variable que contiene la
            pagina actual. 
            @return $pagActual*/

        public function siguientePagina() {
            $cantidadPaginasLibro = $this -> getObjLibro() -> getCantPaginas();
            
            if ($this -> getPagActual() < $cantidadPaginasLibro) {
                $this -> setPagActual($this -> getPagActual() + 1) ;
            } 

            return $this -> getPagActual();

        }

        /* retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor. */
        public function retrocederPagina() {
            $cantidadPaginasLibro = $this -> getObjLibro() -> getCantPaginas();

            if (($this -> getPagActual() <= $cantidadPaginasLibro) && ($this -> getPagActual() > 0)) {
                $this -> setPagActual($this -> getPagActual() - 1);
            }

            return $this -> getPagActual();
        }

        /* irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por
        parámetro. */
        Public function irPagina($pagina){
            $cantidadPaginasLibro = $this -> getObjLibro() -> getCantPaginas();
            if ($pagina <= $cantidadPaginasLibro ) {
                $this -> setPagActual($pagina);
            }

            return $this -> getPagActual();
        }

        /** libroLeido($titulo): retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del
            *conjunto de libros leídos y false en caso contrario. 
            *@param string $titulo;
            *@return booleano*/

        public function libroLeido($titulo) {
            $estaLeido = false;
            $i = 0;
            $totalLibros = count($this -> librosLeidos);// total de libros en el array

            while (($i < $totalLibros) && (!$estaLeido)) {
                
                $libroActual = $this -> librosLeidos[$i]; // accedo al libro en la posicion $i

                if ($libroActual -> getTitulo() == $titulo) {
                    $estaLeido = true;
                }

                $i++;
            }

            return $estaLeido;

        }

        /** darSinopsis($titulo): retorna la sinopsis del libro cuyo título se recibe por parámetro.
         * @param string $titulo
         * @return string $sinopsis;
         */

        public function darSinopsis($titulo) {
            $i = 0;
            $sinopsisEncontrada = "No se encontro la sinopsis que busca";
            
            foreach ($this -> librosLeidos as $libro) {
                if ($libro -> getTitulo() == $titulo) {
                    $sinopsisEncontrada = $libro -> getSinopsisLibro();
                }
            }

            return $sinopsisEncontrada;

        }

        /** leidosAnioEdicion($x): que retorne todos aquellos libros que fueron leídos y su año de edición es un
            *año X recibido por parámetro. 
            *@param int $anio
            *@return array 
        */
        public function leidoAnioEdicion($anioX) {
            $librosAnioX = [];// inicializo un arreglo vacio para guardar todos los libros con el anio de edicion realizado en la consulta

            //foreach para recorrer el arreglo e ir guardando en el arreglo $librosAnioX 
            foreach ($this -> librosLeidos as $libro){
                if ($libro -> getAnioEdicion() == $anioX) {
                    $librosAnioX[] = $libro;
                }
            }

            return $librosAnioX;
        }

        /** darLibrosPorAutor($nombreAutor): retorna todos aquellos libros que fueron leídos y el nombre de su
            * autor coincide con el recibido por parámetro.
            *@param string $nombreAutor
            *@return array 
        */

        public function darLibrosPorAutor($nombreAutor) {
            $librosAutor = []; //Inicializo un arreglo para guardar y poder mostrar los libros que fueron leidos por nombre de autor

            foreach ($this -> getLibrosLeidos() as $libro){
                $autor = $libro -> getObjPersona();
                $nombreCompleto = $autor -> getNombre() . " " . $autor -> getApellido();
                if ($nombreCompleto == $nombreAutor) {
                    $librosAutor[] = $libro;
                }
            }
            return $librosAutor;

        }



        

        public function __toString(){
            return "Libro: " . $this -> getObjLibro() . "\n continue su lectura desde la pagina: " . $this -> getPagActual();
        }

    }





?>