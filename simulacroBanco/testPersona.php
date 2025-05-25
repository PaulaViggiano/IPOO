<?php
    include_once 'Persona.php';
    include_once 'Cuota.php';
    include_once 'Prestamo.php';

    $persona1 = new Persona("Paula", "Viggiano", 123456678, "Amncay", "pauvigg@gmail.com", 1234322, 123456222);

    /* echo $persona1; */

    $cuota = new Cuota(4, 12345, 400, true);
    
    /* echo $cuota; */

    $prestamo = new Prestamo(1010, "09-04-2024", 50000, 5, 0.1, $cuota, $persona1);

    echo $prestamo -> darSiguienteCuotaPagar();








?>