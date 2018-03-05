<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$firmado = $_REQUEST['firmado'];



function guardar(){
    session_start(); /* Iniciamos Sessión*/
    if(!isset($_SESSION['cont'])) $_SESSION['cont']=0;
    if($_SERVER['REQUEST_METHOD']=='POST'){ /* Validamos el Método*/
        if(isset($_POST['firmado'])){ /* Validamos el TextArea*/
            if(trim($_POST['firmado'])!=''){/* Validamos que no esté vacío*/
                $valor = $_POST['firmado'];
                $archivo = fopen("Archivo".$_SESSION['cont'].".txt", "w");
                $_SESSION['cont']=$_SESSION['cont']+1; /* Incrementamos el contador*/
                fwrite($archivo, $valor);
                fclose($archivo);
               
                echo "<script language='javascript'>";
                echo "alert('Archivo guardado correctamente')";
                echo "</script>"; 
            }
        }
    }
}


function guardar2(){
    $fichero = 'clave.txt';
// La nueva persona a añdir al fichero
$firmado =  $_POST['firmado'];
// Escribir los contenidos en el fichero,
// usando la bandera FILE_APPEND para añadir el contenido al final del fichero
// y la bandera LOCK_EX para evitar que cualquiera escriba en el fichero al mismo tiempo
file_put_contents($fichero, $firmado, FILE_APPEND | LOCK_EX);
}

function guardar3(){
echo "<script language='javascript'>";
                echo "alert('Archivo guardado correctamente')";
                echo "</script>"; 
}


