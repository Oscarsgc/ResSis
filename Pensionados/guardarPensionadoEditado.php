<?php
	$codigo = $_POST["codigo"];
	$ci = $_POST["ci"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$telefono = $_POST["telefono"];
	$estado = $_POST["estado"];

	$db = mysql_connect("localhost", "root", "root");
	mysql_select_db("restaurant",$db);
	mysql_query("UPDATE pensionados SET ci='$ci', nombre='$nombre', direccion='$direccion', telefono='$telefono', estado='$estado' WHERE cod_pensionado='$codigo'", $db);
	echo "Pensionado Modificado";
	echo "<BR>";
	echo "<a href='ListaPensionados.php'>Ver Tabla</a>";
?> 

