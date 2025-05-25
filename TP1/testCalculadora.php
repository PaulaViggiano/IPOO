<?php
    include 'calculadora.php';

    $calculadora1 = new Calculadora(10, 2);
    
    echo "El resultado de la suma es: " . $calculadora1 -> sumar(10, 2) . "\n";
    echo "El resultado de la resta es: " . $calculadora1 -> restar(10, 2) . "\n";
    echo "El resultado de la division es: " .$calculadora1 -> dividir(10, 2) . "\n";
    echo "El resultado de la multiplicacion es: " .$calculadora1 -> multiplicar(10, 2) . "\n";

    echo "Los numeros elegidos para las operaciones fueron:  " . $calculadora1 . "\n";





?>
