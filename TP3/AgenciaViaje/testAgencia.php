<?php
    include_once 'Persona.php';
    include_once 'Cliente.php';
    include_once 'Destino.php';
    include_once 'PaqueteTuristico.php';
    include_once 'Agencia.php';
    include_once 'Venta.php';
    include_once 'OnLine.php';

    /* se crea una instancia de la clase Destino con los siguientes valores: lugar =“Bariloche”, valorDia
     *=250. 
    */
    $elDestino = new Destino(1, "Bariloche", 250);

    /* se crea una instancia de la clase PaqueteTuristico referenciando al destino creado en (a) con los
     *siguientes valores: fdesde = 23/05/2014 cantDias= 3, totalPlazas = 25. 
    */
    $elPaquete = new PaqueteTuristico("2014-05-23", 3, $elDestino, 25);

    /* se crea instancia de la clase Agencia. */
    $laAgencia = new Agencia();

    /* se invoca al método incorporarPaquete de la agencia con el paquete creado en (b). */
    $laAgencia -> incorporarPaquete($elPaquete);

    /* se invoca nuevamente al método incorporarPaquete de la agencia con el paquete creado en (b). */
    $laAgencia -> incorporarPaquete($elPaquete);

    /* se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con los
     siguientes datos del cliente: número de documento 27898654, y tipo de documento DNI, cantidad de
     personas que viaja: 5, y no es una venta online. 
    */
    $laAgencia -> incorporarVenta($elPaquete, "DNI", 27898654, 5, false);

    /* se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un
     cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que
     viaja: 4, y es una venta online 
    */
    $laAgencia -> incorporarVenta($elPaquete, "DNI", 27898654, 4, true);

    /* se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un
     cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que
     viaja: 15, y es una venta online.
    */
    $laAgencia -> incorporarVenta($elPaquete, "DNI", 27898654, 15, true);

    echo $laAgencia;












?>