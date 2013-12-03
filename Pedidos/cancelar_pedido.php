<?php include ("../seguridad.php");?>
<?php
	require("../db/conexion_db.php");
	$id=$_GET["aux"];
	$estado=$_GET["estado"];
	$res=mysql_query("SELECT usuario FROM pedido WHERE cod_pedido='$id'");
	$row=mysql_fetch_row($res);
	if ($_SESSION["usuario"] == $row[0] || $_SESSION["rol"] != '3') {
		if($estado=='1')
			$estado='0';
		else
			$estado='1';
		mysql_query("UPDATE pedido SET estado='$estado' WHERE cod_pedido='$id'");
		header("Location: index.php");
	} else {
		header("Location: ../Usuarios/login.php");
	}
?>
