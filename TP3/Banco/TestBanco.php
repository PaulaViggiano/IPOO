<?php
    include_once 'Persona.php';
    include_once 'Cliente.php';
    include_once 'Cuenta.php';
    include_once 'CajaAhorro.php';
    include_once 'CuentaCorriente.php';
    include_once 'Banco.php';


    $colClientes = [];
    $colCajaAhorro = [];
    $colCuentaC = [];
    $miBanco = new Banco($colCuentaC, $colCajaAhorro, 5, $colClientes);


    //INSTANCIA CLIENTE
    $cliente1 = new Cliente(1234, "Juan", "Perez", 12);
    $cliente2 = new Cliente(5432, "Maru", "Pepe", 13);
    
    $miBanco -> incorporarCliente($cliente1);
    $miBanco -> incorporarCliente($cliente2);

    //INSTANCIAS CUENTA CORRIENTE
    $cuentaCorriente1 = new CuentaCorriente(1, 0, $cliente1, 500);
    $cuentaCorriente2 = new CuentaCorriente(2, 0, $cliente2, 1000);
    $miBanco -> incorporarCuentaCorriente(12, 6000);
    $miBanco -> realizarDeposito(1, 4000);
    $miBanco -> incorporarCuentaCorriente(13, 500);
    $miBanco -> realizarDeposito(2, 5000);

    /* Crear tres Cajas de Ahorro, dos asociadas al cliente A y una asociada al cliente B, y agregarlas al Banco. */
    $cajaAhorro1 = new CajaAhorro(3, 0, $cliente1);
    $cajaAhorro2 = new CajaAhorro(4, 0, $cliente2);
    $cajaAhorro3 = new CajaAhorro(5, 0, $cliente1);
    
    $miBanco -> incorporarCajaAhorro(12);
    $miBanco -> realizarDeposito(3,2000);

    $miBanco -> incorporarCajaAhorro(13);
    $miBanco -> realizarDeposito(4, 4000);
    $miBanco -> incorporarCajaAhorro(12);
    $miBanco -> realizarDeposito(5, 7000);
    
    /* Depositar $300 en cada una de las Cajas de Ahorro. */
    $miBanco -> realizarDeposito(3,300);
    $miBanco -> realizarDeposito(4, 300);
    $miBanco -> realizarDeposito(5, 300);


    /* Transferir $150 de la Cuenta Corriente de Cliente1, a la Caja de Ahorro de Cliente2. */
    $miBanco -> realizarRetiro(1,150);
    $miBanco -> realizarDeposito(4,150);

    /* Mostrar los datos de todas las cuentas. */

   /*  echo $miBanco; */
   $cuentasCaja=$miBanco -> getColeccionCajaAhorro();
   for ($i=0; $i < count($cuentasCaja); $i++) { 
        $cuenta=$cuentasCaja[$i];
        echo "--------------------------------------\n\n";
        echo $cuenta;
   }

    //Probando la funcion merge que concatena dos arreglos
    /* $arreglo1 = [01,02,03];
    $arreglo2 = [04,05,06];

    $arregloExt = array_merge($arreglo1, $arreglo2);

    print_r($arregloExt); */


?>