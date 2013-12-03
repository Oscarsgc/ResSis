<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php require("../db/conexion_db.php"); ?>
<?php
	$ci = $_POST["ci"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$telefono = $_POST["telefono"];
	$estado = $_POST["estado"];
	$res = mysql_query("INSERT INTO pensionados VALUES ('NULL', '$ci', '$nombre', '$direccion', '$telefono', '$estado')");
	if($res != false){
		mysql_close($db);
		printf("Pensionado Creado");
		header ("Location: listaPensionados.php");
	}else {
		//si no existe le mando otra vez a la portada
		echo "error en base de datos:".mysql_error();
		mysql_close($db);
	}
	echo "<a href='listaPensionados.php'>Ver Tabla</a>";
?>

