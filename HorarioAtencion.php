<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> HORARIO DE ATENCION </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body align=center background=r.jpg>
	
	<br><br><br><br><br><br>

	<table align=center bgcolor=#cccc00>
	<tr><td bgcolor=#cc6600><h1> Horario de Atencion</h1>
	
<h2 color=#ffffff >
<?php

$file=fopen("Horarios.txt","r+") or exit ("No se pudo abrir el documento Horarios.txt =(");
while(!feof($file))
  {
  echo fgets($file). "<br>";
  }
fclose($file);
?>
	</tr></td>
 
</table>
 </body>
</html>
