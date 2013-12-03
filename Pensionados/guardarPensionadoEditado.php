<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
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
	header("Location: ../Pensionados/listaPensionados.php")
	
?> 

