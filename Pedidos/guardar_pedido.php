
<?php require("../db/conexion_db.php"); ?>
<?php
	$now = new DateTime();
	date_timezone_set($now, timezone_open('America/La_Paz'));
	$fecha = $now->format('Y-m-d H:i:s');

	$cant_platos = $_POST["cantSel1"];
	$cant_bebidas = $_POST["cantSel2"];
	$cant_guarniciones = $_POST["cantSel3"];

	$nombre=$_POST["nombre"];
	$nit=$_POST["nit"];
	$dir=$_POST["dir"];
	$telf=$_POST["telf"];
	$id="";

	$res = mysql_query("INSERT INTO pedido VALUES ('NULL', '$nombre', '$nit', '$dir', '$telf', '$fecha', '1')");
	
	$cod= mysql_query("SELECT cod_pedido FROM pedido WHERE fecha='$fecha'");

	while($row=mysql_fetch_row($cod)){
		$id=$row[0];
	}

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["plato".$i];
		$cant=$_POST["cant_plato".$i];
		$res=mysql_query("INSERT INTO pedido_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["bebida".$i];
		$cant=$_POST["cant_bebida".$i];
		$res=mysql_query("INSERT INTO pedido_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["guarnicion".$i];
		$cant=$_POST["cant_guarnicion".$i];
		$res=mysql_query("INSERT INTO pedido_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	header ("Location: ver_pedido.php?aux=$id");
	
?>