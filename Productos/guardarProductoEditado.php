<?php
	$codigo = $_POST["codigo"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$precio = $_POST["precio"];
	$estado = $_POST["estado"];
	
	$db = mysql_connect("localhost", "root", "root");
	mysql_select_db("restaurant",$db);
	mysql_query("UPDATE producto SET cod_producto='$codigo', nombre='$nombre', tipo='$tipo', precio='$precio', estado='$estado' WHERE cod_producto='$codigo'");
	echo "Producto Modificado";
	echo "<BR>";
	echo "<a href='ListaProductos.php'>Ver Tabla</a>";


?> 
