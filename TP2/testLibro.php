<?php
    include_once 'Libro.php';
    include_once 'Persona.php';

    //Creo la nueva instancia de Persona
    $miPersona = new Persona("Eric", "from", "dni", 12345678);
    //Creo mi enstancia Libro
    $miLibro = new Libro(1234, "El arte de amar", 2006, "blabla", 356, "Trata sobre las diferentes formas de amar y blabla", $miPersona);
   

    echo $miLibro;




?>