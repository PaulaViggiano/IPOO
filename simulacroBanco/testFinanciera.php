<?php
    include_once 'Persona.php';
    include_once 'Cuota.php';
    include_once 'Prestamo.php';
    include_once 'Financiera.php';

    /* Objeto financieta */
    $financiera1 = new Financiera("Money", "Av Argentina 1234");


    /* 3 Objetos prestamo */
    $persona1 = new Persona("Pepe", "Flores", 123456, "BuenosAires 12", "dir@mail.com", "299 444567", 40000);
    $prestamo1 = new Prestamo(1, 50000, 5, 0.1, $persona1);

    $persona2 = new Persona("Luis", "Suarez", 12322, "Buenos Aires 123", "dir@mail.com", "299 444567", 4000);
    $prestamo2 = new Prestamo(2, 10000, 4, 0.1, $persona2);

    $persona3 = new Persona("Luis", "Ramon", 12322, "Buenos Aires 123", "dir@mail.com", "299 444567", 4000);
    $prestamo3 = new Prestamo(3, 10000, 2, 0.1, $persona3);

    //INCORPORO LOS PRESTAMOS A LA FINANCIERA
    $financiera1 -> incorporarPrestamo($prestamo1);
    $financiera1 -> incorporarPrestamo($prestamo2);
    $financiera1 -> incorporarPrestamo($prestamo3);

    /* MUESTRO FINANCIERA ANTES DE OTORGAR PRESTAMOS */
    
    echo $financiera1;

    echo "DESPUES DE OTORGAR PRESTAMOS SI  CALIFICA\n";
    echo $financiera1 -> otorgarPrestamoSiCalifica();

    echo $financiera1;

     $objCuota =  $financiera1 -> informarCuotaPagar(2); 
     echo "\n================== CUOTA A PAGAR (PRÉSTAMO 2) ==================\n";
     echo $objCuota;

    /*
    echo $objCuota;

    echo $objCuota -> darMontoFinalCuota();

    echo $objCuota -> setCancelada(true); */


?>