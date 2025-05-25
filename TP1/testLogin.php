<?php
include_once 'login.php';
/* $arreglo = ["2345", "3456", "4567", "5678"];
$contra = ""; */

$login1 = new Login("Maru", "1234", "la vida es bella");


echo $login1 -> cambiarPass("1234", "7777") ? "Exito se cambio la contrasenia \n" : " \nError";
echo $login1 -> cambiarPass("7777", "1234") ? "Exito \n" : "\n Error no se puede cambiar porque es una contrasenia ya usada";

echo $login1;








?>