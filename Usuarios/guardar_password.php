<?php include ("../seguridad.php");?>
<?php 
require("../db/conexion_db.php");
$login = $_POST["login"];
$antiguo = $_POST["antiguo"];
$nuevo = $_POST["nuevo"];
$conf = $_POST["conf"];
$res = mysql_query("SELECT password FROM usuarios WHERE login='$login'");
$row = mysql_fetch_row($res);
if($nuevo == $conf && MD5($antiguo) == $row[0]){
	$pass = MD5($nuevo);
	$res = mysql_query("UPDATE usuarios SET password='$pass' WHERE login='$login'");
	mysql_close($db);
	echo mysql_error();
	header("Location: perfil.php?aux=$login");
}
else
	header("Location: editar_password.php?aux=$login");
?>