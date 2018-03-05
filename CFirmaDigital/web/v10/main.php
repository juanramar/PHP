<!DOCTYPE html>
<!--
https://diego.com.es/ssl-y-openssl-en-php
-->
<?php
    include 'funcionesv10.php';
    //Para ocultar los warnings
    ini_set('error_reporting',0);
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div align="center">
            <form name="input"  method="post">   
                <br/><br/><input type="submit" name="generar" value="Generar Llaves"/><br/><br/><br/><br/>
            </form>  
        </div>
        
        <form action="code.php" method="post" >     
            <!--Texto-->
            <label for="nombre">Texto a cifrar: </label>
            <input type="text" name="texto_plano" value="Hello World" style="width:500px;height:15px" maxlength="32" pattern="[a-zA-Z0-9 ,.'-]{3,48}" title='Mínimo 3 Caracteres y máximo 32' required>
            <br/><br/>
            <input type="submit" name="submit" value="Cifrar">
            <input type="reset" name="clear" value="Borrar">
        </form>
        <div align="center">
            <p>
                <input type="button" value="Home" name="volver atrás" onclick="location='../../index.php'" />
            </p>
        </div>
        
           
     
        <?php
            if($_POST[generar]){ 
                generar();
            }
        ?>     
        
    </body>
</html>

        
       