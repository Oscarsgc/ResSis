<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> HORARIO DE ATENCION </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>
	<h1> Horario de Atencion</h1>
	<br>
	<br>
<h2>
<?php

$file=fopen("Horarios.txt","r+") or exit ("No se pudo abrir el documento Horarios.txt =(");
while(!feof($file))
  {
  echo fgets($file). "<br>";
  }
fclose($file);
?>
</h2>
 </body>
</html>
