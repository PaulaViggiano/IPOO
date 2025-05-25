<?php
    include_once 'Producto.php';
    include_once 'Item.php';
    include_once 'Venta.php';
    include_once 'Tienda.php';

    $producto1 = new Producto("001", "Remera", "Levis", "Blanco", "L", "Remera Mujer", 3);
    $producto2 = new Producto("002", "Medias", "Levis", "negro", "M", "Medias media cania", 4);
    $producto3 = new Producto("003", "Pantalon", "Levis", "Jean", "42", "Jean Mujer", 10);
    $producto4 = new Producto("004", "Camisa", "Levis", "Azul", "M", "Camisa de camping", 3);

    $colProductos = [$producto1, $producto2, $producto3, $producto4];
    
    $tienda1 = new Tienda("Levis", "AV Argentina", "1234", $colProductos);

    $arregloAsociativo = [["codigoBarra" => "001" , "cantidad" => 5], ["codigoBarra" => "002", "cantidad" => 2], ["codigoBarra" => "003", "cantidad" => 3]];

    $mostrar = $tienda1 -> realizarVenta($arregloAsociativo);

    echo $mostrar;




?>