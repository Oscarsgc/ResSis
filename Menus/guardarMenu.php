<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php require("../conexion_db.php"); ?>
<?php
	$now = new DateTime();
	date_timezone_set($now, timezone_open('America/La_Paz'));
	$fecha = $now->format('Y-m-d');
	
	$dia = $_POST["dia"];

	$estado = $_POST["estado"];

	$cant = $_POST["cantSel"];


	$res = mysql_query("INSERT INTO menu_dia VALUES ('NULL','$dia', '$fecha', 'NULL', '$estado')");
	
	$cod= mysql_query("SELECT cod_menu_dia FROM menu_dia WHERE fecha_inicio='$fecha'");

	while($row=mysql_fetch_row($cod)){
		$id=$row[0];
	}

	$i=0;
	while($i<$cant){
		$value=$_POST["Producto".$i];
		$res=mysql_query("INSERT INTO producto_menu_dia VALUES ('NULL','$id', '$value')");	
		$i=$i+1;
	}

	header ("Location: listaMenuDiario.php");
	
?>