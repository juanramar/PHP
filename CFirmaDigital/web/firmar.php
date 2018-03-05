<!DOCTYPE html>
<!--
https://www.adictosaltrabajo.com/tutoriales/firmas-firefox/

Hola!!!! gracias por tu artículo...... No domino mucho la creación de servlet, 
pero creo que lo he conseguido desde NetBeans, creando un proyecto nuevo Java Web 
y en web pages añadiendo el index.html y en source packages creando el servlet 
CompruebaFirmaDigital.java
Me he vuelto loco porque el crypto.signText parece ser que no funciona bien con
la última versión de firefox, así que he instalado una antigua la 38.05 y le he 
instalado la extensión signTextJS 0.7.8...
Hasta ahí todo perfecto, pero cuando le doy a firmar me salta la ventanita que 
pones aquí con el texto de prueba, puedo seleccionar los certificados que tengo 
instalados en el navegador sin problemas, pero cuando le doy a firmar, me salta: 
Su navegador no ha generado una firma válida y no tengo ni idea de porqué es...... 
Cuando le doy a enviar, me salta: [ERROR VALIDATING SIGNATURE].... 
pero me imagino que eso será normal, puesto que he obtenido el error anterior a
la hora de firmar..... Un salido y gracias!!!!
-->

<?php
include 'funciones.php';   
?>

<html>
    <head>
        <title>Prueba de firma digital</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <script type="text/javascript" src="firmar.js"></script>
       
    </head>
    
    <body>
        <div align="center">
            <h1>Prueba de firma digital</h1>
        </div>
        
        <div id="cuerpo" align="center">
            
            <form name="input"  method="post">
                <textarea id="original" name="original" cols="20" rows="20">Hello World</textarea>
                <textarea id="firmado" name="firmado" cols="20" rows="20" ></textarea><p></p>
                <!--Input antiguo -->
                <!--<input type="button" value="Firmar" onclick="document.forms[0].firmado.value=firmar(document.forms[0].original.value)"/>-->
                <!--Input OK-->
                <input onclick="signDigest(document.getElementById('original').value); " type="button" value="Firmar/Encriptar" />
                <!--<input type="submit" value="Guardar TXT" />-->
                <input type="submit" value="GUARDAR TXT" name="guardar"  >
              
                <!--<input type="submit" value="Copiar Clave" name="copiar">-->
                <br/><br/><span>Selecciona el codigo generado y Aprieta Ctrl+C para copiar (Cmd + C en Mac)</span>
            </form>
            
           
         
            <?php
                #$valor = $_POST['firmado'];
            
           
                if (isset($_REQUEST['guardar'])) {
                    guardar();
                }
               
            
        ?>
            
            
        
            
        </div>
        
        <div align="center">
            <p>
                <input type="button" value="Home" name="volver atrás" onclick="location='index.php'" />
            </p>
        </div>
        
    <?php
        //guardar();
    ?>
    </body>
</html> 


 