<?php

    include_once 'persona.php';
    include_once 'cuentaBancaria.php';

    $persona = new Persona("Paula", "Viggiano", "DNI", "30410155");

    echo $persona;


$obj_cuentaBancaria = new CuentaBancaria('1234', $persona, 1000000, 15);
    echo $obj_cuentaBancaria;

?>
