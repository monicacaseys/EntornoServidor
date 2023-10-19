<?php

$fileTempPath=$_FILES["uploadfile"]["tmp_name"];//carpeta y el nombre temporal
$fileName=$_FILES["uploadfile"]["name"]; //nombre del archivo
$fileSize=$_FILES["uploadfile"]["size"];//tamaño del archivo
$fileType=$_FILES["uploadfile"]["type"]; //tipo de archivo



//vamos a averiguar la extension del archivo
$fileNameCamps=explode(".",$fileName); //array con las partes del nombre, partido por el . 
$fileExtension =strtolower(end($fileNameCamps)); //el end me coge el ultimo elemento del array.y strtolower me lo convierne a minuscula
//vamos a sanitizar el nombre del archivo, kitar cosas raras, inventandonos un nuevo nombre del archivo
//$newFileName= md5(time() . $fileName) . $fileExtension; //coge la hora y despues el nombre del archivo y depsues su extension con un mt5 que es un sistema de codificacion

$newFileName= "mseysoltra_" . $fileName . "." . $fileExtension;

//echo "el nuevo nombre del fichero es " . $newFileName;

//extensiones permitidad
$allowedFileExtensions = array("jpg", "gif", "png", "docx");
$max_file_size=2000000; //tamaño max

//if(in_array(lo k busco, donde lo busco))
if(in_array($fileExtension,$allowedFileExtensions)&& $fileSize < $max_file_size){
    $uploadFileDir="./upload_files/";//carpeta donde se van a guardar los archivos
    $destino_path = $uploadFileDir . $newFileName; //carpeta y el nombredel archivo es el path completo
    //para mover un archivo en php se una la funcion: (/me devuelve un booleano)
    if (move_uploaded_file($fileTempPath, $destino_path)) {
header ("location: inicio_formulario.php");

    }else {
echo "algo ha ido mal";
    }
} else {
echo "no se puede guardar el archivo";
}


?>