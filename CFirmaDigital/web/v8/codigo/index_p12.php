<!DOCTYPE html>
<?php 
/*http://www.forosdelweb.com/f18/leer-validar-certificados-digitales-personales-con-php-1151002/
http://www.cristalab.com/blog/certificados-de-seguridad-y-ssl-bien-explicados-c91629l/
 empezamos comprobando si la petición se hizo en modo seguro o no. La variable de entorno HTTPS recoge es condición. 
   Si estamos en modo seguro recogerá en la variable cert el valor transferido en la peticion 
   y en caso contrario leería el fichero de ejemplo que tenemos en el directorio cursophp y al que se accede en modo no seguro */ 

$ruta_certificado = 'certificado/'. $_POST['ruta_certificado_p12'];
$clave = $_POST['clave'];
$texto = $_POST['texto'];



print_r($ruta_certificado);
echo "</br>";  



$p12cert = array();
$file = $ruta_certificado;
$pass = $clave;
$fd = fopen($file, 'r');
$p12buf = fread($fd, filesize($file));
fclose($fd);
echo "<h1>Mi Primer Test</h1>";
if ( openssl_pkcs12_read($p12buf, $p12cert, $pass) )
{
   echo "Funciona";
}
else
{
    echo "<font size=\"6\"><b><span style=\"color: #FF0000\">NO FUNCIONA</span></b></font><br/>";
}
$privatekey = $p12cert["pkey"];
$res=openssl_pkey_new();
openssl_pkey_export($res, $p12cert["pkey"]);
$publickey=openssl_pkey_get_details($res);
$publickey=$publickey["key"];

echo "<h2>Private Key:</h2>$privatekey<br><h2>Public Key:</h2>$publickey<BR>";

$cleartext = htmlentities("Hola Mundo & Amo OpenSSL aunque sea malvado");

echo "<h2>Original:</h2>$cleartext<BR><BR>";

openssl_public_encrypt($cleartext, $crypttext, $publickey);

echo "<h2>Encriptada:</h2>$crypttext<BR><BR>";

$PK2=openssl_get_privatekey($p12cert["pkey"]);

$Crypted=openssl_private_decrypt($crypttext,$Decrypted,$PK2);
if (!$Crypted) {
   $MSG.="<p class='error'>Imposible desencriptar ($CCID).</p>";
}else{
   echo "<h2>Desencriptada:</h2>" . $Decrypted;
}
?>

<div align="center">
    <p>
       
        <input type="button" value="Atrás" name="volver atrás" onclick="location='./main.php'" />
       
    </p>
</div>