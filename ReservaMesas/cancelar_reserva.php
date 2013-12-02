<?php
	require("../db/conexion_db.php");
	$id=$_GET["aux"];
	$estado=$_GET["estado"];
	if($estado=='1')
		$estado='0';
	else
		$estado='1';
	mysql_query("UPDATE reserva_mesa SET estado='$estado' WHERE cod_reserva_mesa='$id'");
	header("Location: index.php");
?>
