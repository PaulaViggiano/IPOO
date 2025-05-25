<?php

    include_once 'Disquera.php';
    include_once 'Persona.php';

    //Creo el objeto duenio para pasarselo por parametros al objeto disc1 $name, $surname, $typeDoc, $numberDoc
    $obj_duenio = new Persona("Ana", "Gonzalez", "dni", 12345678);
    //Creo la nueva instancia de disc1 $abre, $cierra, $estado, $dir_disquera, $obj_persona 
    $disc1 = new Disquera(9, 18, true, "Avenida Argentina", $obj_duenio);

    

  
    
    


?>