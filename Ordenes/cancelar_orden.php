<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php
	require("../db/conexion_db.php");
	$id=$_GET["aux"];
	$estado=$_GET["estado"];
	if($estado=='1')
		$estado='0';
	else
		$estado='1';
	mysql_query("UPDATE orden SET estado='$estado' WHERE cod_orden='$id'");
	header("Location: index.php");
?>
