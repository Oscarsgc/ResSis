<?php
	require("../db/conexion_db.php");
	$id=$_GET["aux"];
	$estado=$_GET["estado"];
	if($estado=='1')
		$estado='0';
	else
		$estado='1';
	mysql_query("UPDATE pedido SET estado='$estado' WHERE cod_pedido='$id'");
	header("Location: index.php");
?>