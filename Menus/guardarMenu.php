
<?php require("../conexion_db.php"); ?>
<?php
date_default_timezone_set('GMT-4');

	$dia = $_POST["dia"];

	$estado = $_POST["estado"];

	$cant = $_POST["cantSel"];

	$value=$_POST["Producto"];
	echo $value;
	//$fecha = new mktime();
	//echo date('Y-m-d H:i:s', $fecha);
	$fecha = date(DATE_RFC2822);


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

	//header ("Location: listaMenuDiario.php");
	
?>