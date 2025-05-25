<?php
    include_once 'cuentaBancaria.php';

    //Creo una nueva instancia o un nuevo objeto pasando por parametros los valores de los atributos.
    $cuenta1 = new CuentaBancaria("1234", "30410155", "100000", "1000");

    echo $cuenta1;//Esto muentra lo que hive en el toString de cuenta bancaria

    echo "---------------------------------------------------------------------\n";
    //Creo un nuevo objeto o instancia pidiendo los datos por teclado;
    echo "Ingrese el numero de su cuenta bancaria: \n";
    $numC = trim(fgets(STDIN));

    echo "Ingrese el numero de documento: \n";
    $dniC = trim(fgets(STDIN));

    echo "Ingrese su saldo actual: \n";
    $salC = trim(fgets(STDIN));

    echo "Ingrese el interes anual: \n";
    $intC = trim(fgets(STDIN));

    $cuenta2 = new CuentaBancaria($numC, $dniC, $salC, $intC);

$cuenta2 -> actualizarSaldo();
echo $cuenta2;

echo "\n-------------------------------------------------------------\n";
echo "Ingrese la cantidad de dinero a depositar";
$cant = trim(fgets(STDIN));
$depoRealizado = $cuenta2 -> depositar($cant);
echo $depoRealizado ? "Deposito realizado, saldo actual: $" . $cuenta2 -> getSaldoActual() . "\n" : "Deposito no realizado. Saldo actual: $" . $cuenta2 -> getSaldoActual() . "\n";
echo $cuenta2;

echo "\n--------------------------------------------------------------\n";
echo "Ingrese la cantidad de dinero que retira: \n";
$montoRetira = trim(fgets(STDIN));
//Retiro es la variable booleana que use en cuentaBancaria depende su valor es lo que va a mostar el echo
$retiro = $cuenta2 -> retirar($montoRetira);

//Como la variable retiro en mi Cuenta bancaria es un booleano, lo que hago es una ternaria para mostrar una cosa si es verdadera y otra si es falsa.
echo $retiro ? "Retiro realizado. Su saldo actual es: $ " . $cuenta2 -> getSaldoActual() . "\n" : "No se realizo el retiro. Saldo actual: $" . $cuenta2 -> getSaldoActual() . "\n";

//Este muestra como quedaron los datos de la instancia luego del retiro.
echo $cuenta2;

echo "\n-------------------------------------------------------------\n";


?>