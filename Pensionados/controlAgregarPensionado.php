<?php
	$codigo = $_POST["codigo"];
	$ci = $_POST["ci"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$telefono = $_POST["telefono"];
	$estado = $_POST["estado"];
	$db = mysql_connect("localhost", "root", "root");
	if (!$db){
		echo "error en base de datos: ".mysql_error($db);
	}
	else {
		mysql_select_db("restaurant",$db);
		$res2 = mysql_query("SELECT cod_pensionado FROM pensionados WHERE cod_pensionado = '$codigo'", $db);
		if($res2 != false){
			if(mysql_num_rows($res2)>0)
			{
				echo "Pensionado ya existe!";
				header ("Location: registrarPensionado.html");
			}
			else
			{
				$res = mysql_query("INSERT INTO pensionados VALUES ('NULL', '$ci', '$nombre', '$direccion', '$telefono', '$estado')", $db);
				if($res != false){
					mysql_close($db);
					printf("Pensionado Creado");
					header ("Location: listaPensionados.php");
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
		echo "<a href='listaPensionados.php'>Ver Tabla</a>";
	}
?>

