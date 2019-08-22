<?php
/*
 testclass.php
 author: Carlos Servín R.
 email: carlos@servin.mx, www.servin.mx
 Create: 22/08/2019
 Update: 22/08/2019
 Valid for php  + 7.1

*/
//Para Mas sseguridad configura la llave  a tu gusto
require_once('AES_crypt.key.php');
//Incluye la clase de cifrado AES
require_once('Class_AES_crypt.php');

$cadenaacifrar='ESCRIBO UN TEXTO QUE DESEO ENCRIPTAR';

$crypt=new AES_crypt();

$cifrado=$crypt->encrypt($cadenaacifrar, $llaveparaencriptar);
//Se pone la cadena a descifrar en este caso la variable $cifrado trae el valor
$descifrado=$crypt->decrypt($cifrado, $llaveparaencriptar);

echo "<br> Llave: ".$llaveparaencriptar."<br>";

echo "<br> Encriptado: ".$cifrado."<br>";

echo "<br> descifrado: ".$descifrado."<br>";

echo "*************************************";
echo "<br>";
echo "Llave aleatoria autogenerada: ".$crypt->generateRandomenkey(256);

 ?>
