<?php
require("../db/conexion_db.php");
//vemos si el usuario y contraseña es váildo
$pass = MD5($_POST["contrasena"]);
$login = $_POST["usuario"];
$res = mysql_query("SELECT login, rol FROM usuarios WHERE login = '$login' and password = '$pass'");
if($res != false){
	if(mysql_num_rows($res)>0)
	{
		mysql_close($db);
		$row=mysql_fetch_row($res);
		session_start();
		$_SESSION["usuario"]=$row[0];
		$_SESSION["rol"]=$row[1];
		$_SESSION["autentificado"]="si";
		header ("Location: ../index.html");
	}else {
		//si no existe le mando otra vez a la portada
		//echo "error en base de datos:".mysql_error($db);
		echo "No existe papa!";
		mysql_close($db);
		header("Location: login.php?errorusuario=si");
	}
}
?>



