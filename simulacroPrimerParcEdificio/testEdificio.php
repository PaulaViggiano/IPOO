<?php
    include_once 'Persona.php';
    include_once 'Inmueble.php';
    include_once 'Edificio.php';

    $persona = new Persona("DNI", 27432561,"Carlos","Martinez",154321233);
    $persona1 = new Persona("DNI", 12333456,"Pepe", "Suarez",4456722);
    $persona2 = new Persona("DNI", 12333422, "Pedro", "Suarez",446678);

    $edificio = new Edificio("Juab B. Justo 3456", [], $persona);

    $inmueble1 = new Inmueble("I1", 1, "local comercial", 50000, $persona1);
    $inmueble2 = new Inmueble("I2", 1, "local comercial", 50000, null);
    $inmueble3 = new Inmueble("I3", 2, "Departamento", 35000, $persona2);
    $inmueble4 = new Inmueble("I4", 2, "Departamento", 35000, null);
    $inmueble5 = new Inmueble("I5", 3, "Departamento", 35000, null);

    $colInmuebles = [$inmueble1, $inmueble2, $inmueble3, $inmueble4, $inmueble5];
    $edificio1 = new Edificio("Juab B. Justo 3456", $colInmuebles, null);

    $mostrar = $edificio1 -> darInmueblesDisponiblesParaAlquiler("Departamento", 40000);
    
    /* print_r($mostrar); */

    /** Invocar al método registrarAlquilerInmueble(objInmueble, objPersona) donde objInmueble es 
     * una referencia a la instancia inmueble cuyo código = I5 y objPersona es una referencia 
     * a una instancia de la clase Persona con los siguientes datos (DNI, 28765436, Mariela,Suarez,25543562). 
     * Visualizar un mensaje que represente si la acción pudo o no ser concretada.
    */  
    $persona3 = new Persona("DNI", 28765436, "Mariela", "Suarez",25543562);
    $mostrarInmueble = $edificio1 -> registrarAlquilerInmueble($inmueble5, $persona3);

    echo $mostrarInmueble ? "Se registro inmueble\n" : "No se pudo registrar\n";

    /** Invocar al método registrarAlquilerInmueble(objInmueble, objPersona) donde objInmueble  es una
     *  referencia a  la instancia inmueble cuyo código = I4 y  objPersona es una referencia 
     * a una instancia de la clase Persona con los  siguientes datos (DNI, 28765436, Mariela,Suarez,25543562). 
     * Visualizar un mensaje que represente si la acción pudo o no ser concretada.  
    */

    $mostrarInmueble1 = $edificio1 -> registrarAlquilerInmueble($inmueble4, $persona3);
    echo $mostrarInmueble1 ? "Se registro inmueble\n" : "No se pudo registrar\n";

    /** Invocar al método calculaCostoEdificio() y visualizar su resultado.  */

    $mostrarCosto = $edificio1 -> calculaCostoEdificio();
    echo $mostrarCosto;

    echo $edificio1;



?>