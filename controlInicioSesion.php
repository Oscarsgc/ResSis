<?php
//vemos si el usuario y contraseña es váildo
$pass = $_POST["contrasena"];
$login = $_POST["usuario"];
$db = mysql_connect("localhost", "root", "");
if (!$db){
	echo "error en base de datos: ".mysql_error($db);
}
else {
	mysql_select_db("restaurant",$db);
	$res = mysql_query("SELECT Login, Password FROM usuarios WHERE login = '$login' and password = '".($pass)."'", $db);
	if($res != false){
		if(mysql_num_rows($res)>0)
		{
			mysql_close($db);
			echo "Usuario Correcto";
			header ("Location: listaUsuarios.php");
	}else {
		//si no existe le mando otra vez a la portada
		echo "error en base de datos:".mysql_error($db);
		mysql_close($db);
		header("Location: index.php?errorusuario=si");
	}}
}
?>



