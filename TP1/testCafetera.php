<?php
    include_once 'Cafetera.php';

    $miCafetera = new Cafetera(1000, 300);

    do {
        echo "-----------Bienvenido-------------\n";
        echo "Indique la opcion: \n 1. Llenar cafetera \n 2. Servir taza de cafe \n 3. Vaciar cafetera \n 4. Agregar cafe \n 5. Salir \n";
        echo "-----------------------------------------------------------\n";
        $option = trim(fgets(STDIN));
        switch ($option) {
            case '1':
                $miCafetera -> llenarCafetera(); 
                echo 'La cafetera se lleno con Exito \n';
                echo $miCafetera;
                echo "-----------------------------------------------------------\n";
                break;
            case '2':
                echo $miCafetera -> servirTaza(200) ? "La taza se sirvio con exito \n" : "No se pudo servir el total solicitado \n";
                echo $miCafetera;
                echo "-----------------------------------------------------------\n";
                break;
            case '3':
                $miCafetera -> vaciarCafetera();
                echo $miCafetera;
                echo "-----------------------------------------------------------\n";
                break;
            case '4':
                echo $miCafetera -> agregarCafe(400) ? "Se agrego cafe correctamente \n" : "Se agrego lo que permitio el maximo de la cafetera \n";
                echo $miCafetera;
                echo "-----------------------------------------------------------\n";
                break;
            case '5':
                echo "Gracias! Vuelva pronto\n";
                echo "-----------------------------------------------------------\n";
                break;
            default:
                echo "Opcion Incorrecta";
                break;
        }
    } while ($option != 5);

    




?>