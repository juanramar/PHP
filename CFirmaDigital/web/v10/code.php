<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'funcionesv10.php';   
       
    
    // Datos a enviar
    $texto = $_POST['texto_plano'];
    
    echo 'Texto plano: ' . $texto;
    // Comprimir los datos a enviar
    $texto = gzcompress($texto);
    // Obtener la llave pública
    $publicKey = openssl_pkey_get_public('file://llaves/public.key');
    $a_key = openssl_pkey_get_details($publicKey);
    // Encriptar los datos en porciones pequeñas, combinarlos y enviarlo
    $chunkSize = ceil($a_key['bits'] / 8) - 11;
    $output = '';
    while ($texto)
    {
        $chunk = substr($texto, 0, $chunkSize);
        $texto = substr($texto, $chunkSize);
        $encrypted = '';
        if (!openssl_public_encrypt($chunk, $encrypted, $publicKey))
        {
            die('Ha habido un error al encriptar');
        }
        $output .= $encrypted;
    }
    openssl_free_key($publicKey);
    // Estos son los datos encriptados finales a enviar:
    $encrypted = $output;
    echo '<br /><br /> Datos encriptados: ' . $output;
    
    // Obtener la llave privada
    if (!$privateKey = openssl_pkey_get_private('file://llaves/private.key'))
    {
        die('No se ha podido obtener la llave privada');
    }
    $a_key = openssl_pkey_get_details($privateKey);
    // Desencriptar los datos de las porciones
    $chunkSize = ceil($a_key['bits'] / 8);
    $output = '';
    while ($encrypted)
    {
        $chunk = substr($encrypted, 0, $chunkSize);
        $encrypted = substr($encrypted, $chunkSize);
        $decrypted = '';
        if (!openssl_private_decrypt($chunk, $decrypted, $privateKey))
        {
            die('Fallo al desencriptar datos');
        }
        $output .= $decrypted;
    }
    openssl_free_key($privateKey);
    // Descomprimir los datos
    $output = gzuncompress($output);
    echo '<br /><br /><br /><br /> Datos sin encriptar: ' . $output;
    
        ?>
    </body>
</html>
