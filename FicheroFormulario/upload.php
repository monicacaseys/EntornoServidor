<?php
$fileTempPath=$_FILES["uploadfile"]["tmp_name"];//carpeta y el nombre temporal
$fileName=$_FILES["uploadfile"]["name"]; //nombre del archivo
$fileSize=$_FILES["uploadfile"]["size"];//tamaño del archivo
$fileType=$_FILES["uploadfile"]["type"]; //tipo de archivo

//vamos a averiguar la extension del archivo
$fileNameCamps=explode(".",$fileName); //array con las partes del nombre, partido por el . 
$filrExtension =strtolower(end($fileNameCamps)); //el end me coge el ultimo elemento del array.y strtolower me lo convierne a minuscula
//vamos a sanitizar el nombre del archivo, kitar cosas raras, inventandonos un nuevo nombre del archivo
$newFileName= md5(time() . $fileName) . $fileExtension; //coge la hora y despues el nombre del archivo y depsues su extension con un mt5 que es un sistema de codificacion