<?php
	$codigo = $_POST["codigo"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$precio = $_POST["precio"];
	$estado = $_POST["estado"];
	
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("restaurant",$db);
	mysql_query("UPDATE producto SET cod_producto='$codigo', nombre='$nombre', tipo='$tipo', precio='$precio', estado='$estado' WHERE cod_producto='$codigo'",$db);
	header("Location: ../Productos/listaProductos.php");
?> 
