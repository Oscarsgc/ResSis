<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] != '1') {
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
	mysql_query("UPDATE usuarios SET estado='$estado' WHERE login='$id'");
	header("Location: listaUsuarios.php");
?>
