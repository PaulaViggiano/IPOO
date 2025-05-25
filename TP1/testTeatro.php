<?php
    include_once 'Teatro.php';

    $unTeatro = new Teatro("Colon", "Cerrito 628");
    echo $unTeatro;

    //Cambiar nombre de teatro
    $unTeatro -> setNombre("Luna Park");
    echo "----------------------------";

    //Modifico el array asociativo por indice
    $unTeatro -> setNombreFuncion(1, "Mago de Oz");
    $unTeatro -> setPrecioFuncion(1, 950);

    echo $unTeatro;



?>