<?php
	$codigo = $_POST["codigo"];
	$precio = $_POST["precio"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$estado = $_POST["estado"];
	$db = mysql_connect("localhost", "root", "root");
	if (!$db){
		echo "error en base de datos: ".mysql_error($db);
	}
	else {
		mysql_select_db("restaurant",$db);
		$res2 = mysql_query("SELECT codigo FROM productos WHERE codigo = '$codigo'", $db);
		if($res2 != false){
			if(mysql_num_rows($res2)>0)
			{
				echo "Producto ya existe!";
				header ("Location: registrarProducto.html");
			}
			else
			{
				$res = mysql_query("INSERT INTO productos VALUES ('$codigo','$nombre', '$tipo', '$precio', '$estado')", $db);
				if($res != false){
					mysql_close($db);
					echo "Producto Creado";
					header ("Location: listaProductos.php");
				}else {
					//si no existe le mando otra vez a la portada
					echo "error en base de datos:".mysql_error($db);
					mysql_close($db);
				}

			}
		}else {
					echo "error en base de datos:".mysql_error($db);
					mysql_close($db);
				}		
	}
?>

