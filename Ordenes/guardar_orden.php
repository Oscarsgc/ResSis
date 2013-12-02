
<?php require("../db/conexion_db.php"); ?>
<?php
	$now = new DateTime();
	date_timezone_set($now, timezone_open('America/La_Paz'));
	$fecha = $now->format('Y-m-d H:i:s');

	$cant_platos = $_POST["cantSel1"];
	$cant_bebidas = $_POST["cantSel2"];
	$cant_guarniciones = $_POST["cantSel3"];

	$nombre=$_POST["nombre"];
	$mesa=$_POST["mesa"];
	echo $mesa."<br>";
	echo $nombre."<br>";
	echo $fecha."<br>";
	$id="";

	$res = mysql_query("INSERT INTO orden VALUES ('NULL','$mesa', '$nombre', '$fecha', '1')");
	
	$cod= mysql_query("SELECT cod_orden FROM orden WHERE fecha='$fecha'");

	while($row=mysql_fetch_row($cod)){
		$id=$row[0];
	}
	echo $id."<br>";

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["plato".$i];
		$cant=$_POST["cant_plato".$i];
		echo $value."<br>";
		echo $cant."<br>";
		$res=mysql_query("INSERT INTO orden_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["bebida".$i];
		$cant=$_POST["cant_bebida".$i];
		echo $value."<br>";
		echo $cant."<br>";
		$res=mysql_query("INSERT INTO orden_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	for ($i=0; $i < $cant_platos; $i++) { 
		$value=$_POST["guarnicion".$i];
		$cant=$_POST["cant_guarnicion".$i];
		echo $value."<br>";
		echo $cant."<br>";
		$res=mysql_query("INSERT INTO orden_producto VALUES ('NULL','$id', '$value', '$cant')");
	}

	//header ("Location: index.php");
	
?>