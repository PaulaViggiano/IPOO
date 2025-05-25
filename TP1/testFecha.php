<?php
    include_once 'fecha.php';

    $entero = 0;
      

    $fecha1 = new Fecha(6,9,2000);
    $fecha2 = new Fecha (19,8,2024);

    echo $fecha1 -> fecha_abreviada() . "\n";
    echo $fecha1 -> fecha_extendida() . "\n";

    echo "Ingrese un numero entero: \n";
    $entero = trim(fgets(STDIN));
    
    echo $fecha1 -> incrementar($entero, $fecha1);

   

    

    







?>