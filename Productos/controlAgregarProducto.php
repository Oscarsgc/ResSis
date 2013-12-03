<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php require("../db/conexion_db.php"); ?>
<?php
	$codigo = $_POST["codigo"];
	$precio = $_POST["precio"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$estado = $_POST["estado"];
	$res2 = mysql_query("SELECT cod_producto FROM producto WHERE cod_producto = '$codigo'");
	if($res2 != false){
		if(mysql_num_rows($res2)>0)
		{
			echo "Producto ya existe!";
			header ("Location: registrarProducto.html");
		}
		else
		{
			$res = mysql_query("INSERT INTO producto VALUES ('$codigo','$nombre', '$tipo', '$precio', '$estado')");
			if($res != false){
				mysql_close($db);
				printf("Producto Creado");
				header ("Location: listaProductos.php");
			}else {
				//si no existe le mando otra vez a la portada
				echo "error en base de datos:".mysql_error();
				mysql_close($db);
			}
		}
	}else {
		echo "error en base de datos:".mysql_error();
		mysql_close($db);
	}		
?>

