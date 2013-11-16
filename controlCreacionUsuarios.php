<?php
	$login = $_POST["usuario"];
	$pass = $_POST["contrasena"];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$ci = $_POST["ci"];
	$rol = $_POST["rol"];
	$estado = $_POST["estado"];
	$db = mysql_connect("localhost", "root", "");
	if (!$db){
		echo "error en base de datos: ".mysql_error($db);
	}
	else {
		mysql_select_db("restaurant",$db);
		$res2 = mysql_query("SELECT Login FROM usuarios WHERE login = '$login'", $db);
		if($res2 != false){
			if(mysql_num_rows($res2)>0)
			{
				echo "Usuario ya existe!";
				header ("Location: crearUsuario.php");
			}
			else
			{
				$res = mysql_query("INSERT INTO usuarios VALUES ('$login', MD5('$pass'), '$ci', '$nombre', '$correo', '$rol', '$estado')", $db);
				if($res != false){
					mysql_close($db);
					echo "Usuario Creado";
					header ("Location: listaUsuarios.php");
				}else {
					//si no existe le mando otra vez a la portada
					echo "error en base de datos:".mysql_error($db);
					mysql_close($db);
				}

			}
		}else {
					//si no existe le mando otra vez a la portada
					echo "error en base de datos:".mysql_error($db);
					mysql_close($db);
				}		
	}
?>

