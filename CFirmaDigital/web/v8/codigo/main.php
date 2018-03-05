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
        <header>
            <h1>CIFRADO DE DATOS:</h1>
        </header> 
        
   
    <form action="index_p12.php" method="post">               
        <!--Seleccion de archivo-->
        <label for="archivo"><b>Archivo del certificado (certificado.p12):</b> </label><p>
        <input type="file" name="ruta_certificado_p12"  required><p>
        
        <label for="archivo">Password del certificado: (juan) </label>
        <input type="password" name="clave" required><p>
            
         <label for="archivo">Texto a encriptar: </label>
        <input type="text" name="texto" style="width:500px;height:15px" value='Hola Mundo & Amo OpenSSL aunque sea malvado' required><p>   
        <br/><br/>
        
        <input type="submit" name="submit" value="Cifrar">
        
    </form>    
        
    <div align="center">
    <p>
        <input type="button" value="Home" name="volver atrás" onclick="location='../../index.php'" />
    </p>
    </div>
 
        <?php
        // put your code here
        //if($_SERVER["HTTPS"] != "on")
        //{
            //header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
            //exit();
        //}
        ?>
    </body>
</html>
