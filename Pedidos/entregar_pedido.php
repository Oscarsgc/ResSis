<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php
	require("../db/conexion_db.php");
	$id=$_GET["aux"];
	$entregado=$_GET["entregado"];
	$res=mysql_query("SELECT usuario FROM pedido WHERE cod_pedido='$id'");
	$row=mysql_fetch_row($res);
	if($entregado=='1')
		$entregado='0';
	else
		$entregado='1';
	mysql_query("UPDATE pedido SET entregado='$entregado' WHERE cod_pedido='$id'");
	header("Location: index.php");
?>
