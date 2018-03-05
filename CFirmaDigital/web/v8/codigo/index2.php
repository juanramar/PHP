<?php


?>

<html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
var form = document.formulario;
var datos = form.datos.value;
 
firma.value = crypto.signText(datos, 'ask');
 
//Para iE hay una solución que sería: 
 
var datosE = datos.getBytes("UnicodeLittleUnmarked");
     </body>
</html>
