<?php include ("../seguridad.php");?>
<?php require("../db/conexion_db.php"); ?>
<?php
	$login = $_POST["usuario"];
	$pass = $_POST["contrasena"];
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$ci = $_POST["ci"];
	$rol = $_POST["rol"];
	$res2 = mysql_query("SELECT login FROM usuarios WHERE login = '$login'");
	if($res2 != false){
		if(mysql_num_rows($res2)>0)
		{
			echo "Usuario ya existe!";
			header ("Location: crearUsuario.php");
		}
		else{
			$res = mysql_query("INSERT INTO usuarios VALUES ('$login', MD5('$pass'), '$ci', '$nombre', '$correo', '$rol', 'NULL', 'NULL', '1')");
			if($res != false){
				mysql_close($db);
				//echo "Usuario Creado";
				header ("Location: listaUsuarios.php");
			}else {
				//si no existe le mando otra vez a la portada
				echo "error en base de datos:".mysql_error();
				mysql_close($db);
			}
		}
	} else {
		//si no existe le mando otra vez a la portada
		echo "error en base de datos:".mysql_error();
		mysql_close($db);
	}		

?>

