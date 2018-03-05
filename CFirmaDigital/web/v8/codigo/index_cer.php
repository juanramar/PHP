<!DOCTYPE html>


<?php 
#http://www.rinconastur.com/php/php24.php
/* empezamos comprobando si la petición se hizo en modo seguro o no. La variable de entorno HTTPS recoge es condición. 
   Si estamos en modo seguro recogerá en la variable cert el valor transferido en la peticion 
   y en caso contrario leería el fichero de ejemplo que tenemos en el directorio cursophp y al que se accede en modo no seguro */ 

$ruta_certificado = $_POST['ruta_certificado_cer'];

if (getenv('HTTPS')=='on'){ 
   $cert=$_SERVER['SSL_CLIENT_CERT']; 
 }else{ 
   $f = fopen($ruta_certificado, "r"); 
   #$f = fopen("juan.cer", "r"); 
 $cert = fread($f, 8192); 
 fclose($f); 
 } 

 /* la funcion openssl_x509_parse nos extrae los datos y los convierte en un array */ 
 $datos = openssl_x509_parse($cert,0); 
?> 
<table style='border-width:2px;border-style:solid;border-color:#eeeeee;padding:2px;font-family:Arial;font-size:10px;text-align:left;' align='center'> 
<tr><td align="center" width="200">Indices del array de datos</td><td align="center" >Valores del array</td></tr> 
<?php 
foreach ($datos as $c1=>$v1){ 
     if (!is_array($v1)){ 
             print "<tr style='font-size:12px;background-color:#dddddd'><td style='text-align:right;color:#ff0000'>['".$c1."']</td><td><span style='color:#0000ff'>".$v1."</td></tr>\r\n"; 
     }else{ 
             foreach ($datos[$c1] as $c2=>$v2){ 
                  if (!is_array($v2)){ 
                       print "<tr style='font-size:11px;background-color:#cccccc'><td style='text-align:right;color:#ff0000'>['".$c1."']['".$c2."']</td><td style='color:#0000ff'>".$v2."</td></tr>\r\n"; 
                  }else{ 
                      foreach ($datos[$c1][$c2] as $c3=>$v3){ 
                          print "<tr style='font-size:10px;background-color:#eeeeee'><td style='text-align:right;color:#ff0000'>['".$c1."']['".$c2."']['".$c3."']</td><td style='color:#0000ff'>".$v3."</td></tr>\r\n"; 
                      } 
                  } 
             } 

     } 

} 
print "</table>" ; 
 $desde=date("d-m-Y H:i:s",$datos['validFrom_time_t']); 
 $hasta=date("d-m-Y H:i:s",$datos['validTo_time_t']); 
 print "Certificado válido desde: ".$desde." hasta: ".$hasta; 
 
 echo "<br><br><br><br>";
 
 print_r($_SERVER);
 
 echo "<br><br><br><br>";
 
 echo "CLAVE CLIENTE:";
 var_dump($_SERVER["serialNumber"]);
 
 //$_SERVER['SSL_CLIENT_CERT']

?>