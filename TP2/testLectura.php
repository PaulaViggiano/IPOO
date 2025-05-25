<?php

    include_once 'Libro.php';
    include_once 'Lectura.php';
    include_once 'Persona.php';

    //Primero genero la instancia de Persona
    $miPersona = new Persona("Eric", "From", "dni", 12345678);
    //Segungo hago la instancia u objeto de Libro y recibe como parametro el objeto persona
    $miLibro = new Libro(1234, "El arte de amar", 2006, "blabla", 356, "Trata sobre las diferentes formas de amar y blabla", $miPersona);
    //Por ultimo hago la instancia de lectura que recibe como parametro Libro
    $miLectura = new Lectura($miLibro, 200);

    /* Genero otra instancia para cargar el array de libros */
    $miPersona1= new Persona("Gabriel", "Garcia Marquez", "DNI", 11234567);
    $miLibro1 = new Libro(432155, "Cien anios de soledad", 1967, "Sudamericana", 471, "La obra narra la historia de la familia Buendía y su pueblo ficticio, Macondo, a lo largo de un siglo.", $miPersona1);
    $miLectura1 = new Lectura($miLibro1, 471);

    $miLectura -> siguientePagina(); 
    $miLectura -> retrocederPagina(); 
    $miLectura -> irPagina(56); 

    $miLectura -> libroLeido($miLibro);

    echo $miLectura;
    
    /* $miLectura1 -> libroLeido($miLibro1 -> getTitulo()); 

    $LibrosLeidosX = $miLectura1 -> getLibrosLeidos();

    echo $librosLeidosX->getTitulo();       // "El arte de amar"
    echo $librosLeidosX->getSinopsisLibro();// "Un análisis del amor..."
    echo $librosLeidosX->getObjPersona();

    echo $miLectura;

    echo $miLectura1; */


   /*  foreach ($biblioteca as $indice => $libro) {
    echo "Libro #" . ($indice + 1) . ":\n";
    echo "Autor: " . $libro["autor"] . "\n";
    echo "Título: " . $libro["titulo"] . "\n";
    echo "Sinopsis: " . $libro["sinopsis"] . "\n\n";
    }  */








?>