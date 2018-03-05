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
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <script type="text/javascript" src="decodificar.js"></script>
       
    </head>
    
    <body>
        <div id="cuerpo_decoder">
        <header>
            <h1>DECODIFICADO DE DATOS:</h1>
        </header> 
        
        <form name="input"  method="post">               
            <!--Seleccion de archivo-->
            <label for="archivo"><b>Seleccionar el archivo con el texto codificado (ArchivoX.txt):</b> </label><p>
            <input type="file" name="nombre_fichero"  required><p>
            <br/><br/>
            <input type="submit" name="submit" value="Cargar Archivo">
        </form>    
 
        <?php
        //ESTO ES PARA QUE ME TOME EL ARCHIVO Y LO LEA EN LA WEB
        ini_set('error_reporting',0);
            $nombre_fichero = $_POST['nombre_fichero'];
            echo "Fichero: " . $nombre_fichero ."<br><br>";    
          
            $fp = fopen($nombre_fichero, "rb");
            $datos = fread($fp, filesize($nombre_fichero));
            fclose($fp);
 
           
        ?>
        
        <div align="center"  >
            <h1>Texto Codificado</h1>
            
            <?php
             //echo "<br><b>CONTENIDO: </b><br> <br>" . base64_decode($datos) ; 
             //NO//echo "<br><b>CONTENIDO: </b><br> <br>" . EncryptedData.Decript($datos) ; ?>
             
          
            <form name="input"  method="post">
                <textarea name="firmado"  cols="20" rows="20"> <?php echo $datos; ?> </textarea>
                <textarea name="original" cols="20" rows="20"></textarea><p></p>
                <!--<input type="button" value="Descifrar" onclick="document.forms[0].original.value=original(document.forms[0].firmado.value)"/>-->
                <input type="button" value="Descifrar" onclick= "document.forms[0].original.value= base64_decode($datos).original.value"/>
                
                <!--<input type="submit" value="Enviar" />-->
            </form>
                <br><br><input type="button" value="Atrás" onclick="location='index.php'"/>
        
        </div>
        
    </body>
</html>
