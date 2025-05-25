<?php
    class Libro {
        
        private $ISBN;
        private $titulo;
        private $anio_edicion;
        private $editorial;
        private $cant_paginas;
        private $sinopsis_libro;
        private $obj_persona;

        public function __construct($isbn, $title, $edition_year, $edit, $pages, $sinopsis, $obj_persona) {
            
            $this -> ISBN = $isbn;
            $this -> titulo = $title;
            $this -> anio_edicion = $edition_year;
            $this -> editorial = $edit;
            $this -> cant_paginas = $pages;
            $this -> sinopsis_libro = $sinopsis;
            $this -> obj_persona = $obj_persona;

        }

        //METODOS DE ACCESO GET
        public function getISBN() {
            return $this -> ISBN;
        }

        public function getTitulo() {
            return $this -> titulo;
        }

        public function getAnioEdicion() {
            return $this -> anio_edicion;
        }

        public function getEditorial() {
            return $this -> editorial;
        }

        public function getCantPaginas() {
            return $this -> cant_paginas;
        }

        public function getSinopsisLibro() {
            return $this -> sinopsis_libro;
        }

        public function getObjPersona() {
            return $this -> obj_persona;
        }

        //METODOS DE ACCESO SET
        public function setISBN($isbn) {
            $this -> ISBN = $isbn;
        }

        public function setTitulo($title) {
            $this -> titulo = $title;
        }

        public function setAnioEdicion($edition_year) {
            $this -> anio_edicion = $edition_year;
        }

        public function setEditorial($edit) {
            $this -> editorial = $edit;
        }

        public function setCantPaginas($pages) {
            $this -> cant_paginas = $pages;
        }

        public function setSinopsisLibro($sinopsis) {
            $this -> sinopsis_libro = $sinopsis;
        }

        public function setObjPersona($miPersona) {
            $this -> obj_persona = $miPersona;
        }

        //ToString redefinido
        public function __toString() {
            return "El ISNB del Libro es: " . $this -> getISBN() . "\n El titulo es: " . $this -> getTitulo() . "\n El anio de edicion:  " . $this -> getAnioEdicion() . "\n La editorial: " . $this -> getEditorial() . "\n Cantidad de paginas: " . $this -> getCantPaginas() . "\n Sinopsis: " . $this -> getSinopsisLibro() . "\n Datos de la persona: " . $this -> obj_persona;
        }

    }



?>