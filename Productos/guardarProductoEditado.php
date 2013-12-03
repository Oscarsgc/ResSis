<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php require("../db/conexion_db.php"); ?>
<?php
	$codigo = $_POST["codigo"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$precio = $_POST["precio"];
	$estado = $_POST["estado"];
	
	mysql_query("UPDATE producto SET cod_producto='$codigo', nombre='$nombre', tipo='$tipo', precio='$precio', estado='$estado' WHERE cod_producto='$codigo'");
	header("Location: ../Productos/listaProductos.php");
?> 
