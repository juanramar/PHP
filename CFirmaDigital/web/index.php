<?php 
	session_start();
	unset($_SESSION['usuario']);
        
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent){
    if(strpos($user_agent, 'MSIE') !== FALSE)
    return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
    else
   return 'No hemos podido detectar su navegador';
}
$navegador = getBrowser($user_agent);
//echo "El navegador con el que estás visitando esta web es: ".$navegador;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    
    
<header>
	<div class="w3-container w3-black w3-center">
		<h1>CODIFICADO DE TEXTO</h1>
	</div>
</header>

	
	<div class="w3-container w3-green">
		<h2>MENU</h2>
	</div>
    
    <div align='right'><?php echo "El navegador con el que estás visitando esta web es: ".$navegador;?></div>
    <div id="cuerpo" align="center" align-vertical="center">
        
    <p>
         <input type="button" value="Firmar Texto con Certificado digital del navegador" name="volver atrás" onclick="location='firmar.php'" />
    </p>
    <p>
         <input type="button" value="Decodificar Texto anteriormente codificado" name="volver atrás" onclick="location='decodificar.php'" />
    </p>
    <span>Para que funcione correctamente ha de estar instalado el plugin 
        <a href="https://addons.mozilla.org/es/firefox/addon/signtextjs/?src=ss">signTextJS</a>
        </br> en <b>Firefox</b> Versión 38.0.5. (No es compatible con la última versión).</span></br>
    <span>Y la librería CAPICON de Microsoft en <b>Internet Explorer</b>.</span></br>
    <span><font size="1">Puedes descargar dicha librería del siguiente enlace: </font></span>
     <a href="https://www.sede.fnmt.gob.es/documents/10445900/10528994/capicom_dc_sdk.msi">Descargar</a></br>
     <span>En <b>Google Chrome</b>, no existe nada creado para el los certificados de dicho navegador.</span>
    <hr style="width:75%; border-width: 5px; border-color:red;">

    <p>
         <input type="button" value="Codificar Texto generando claves publicas y privadas" name="volver atrás" onclick="location='./v10/main.php'" />
    </p>
    <p>
         <input type="button" value="Decodificar Texto anteriormente codificado" name="volver atrás" onclick="location='./v10/decode.php'" />
    </p>
    <span>V10: Primero hay que generar las claves públicas y privadas dándole al botón: Generar Llaves<br/>
    La llave publica es la que deberíamos mandar a la otra persona para que pueda leer el texto decodificado</span>
    <hr style="width:75%; border-width: 5px; border-color:red;">

    
    <p>
         <input type="button" value="Codificar Texto con certificado p12 y codificado en AES" name="volver atrás" onclick="location='./v8/codigo/main.php'" />
    </p>
  
     <span>V8</span>
   
    </div>
    
    

	
<footer>
	<div class="w3-container w3-black" align="center">
		<h4>Nanobytes 2018</h4>
	</div>
</footer>
</body>
</html>