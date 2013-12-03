<?php include ("../seguridad.php");?>
<?php 
require("../db/conexion_db.php");
$login = $_POST["login"];
$antiguo = $_POST["antiguo"];
$nuevo = $_POST["nuevo"];
$conf = $_POST["conf"];
$res = mysql_query("SELECT password FROM usuarios WHERE login='$login'");
$row = mysql_fetch_row($res);
if($nuevo == $conf && $antiguo == $row[0]){
	$res = mysql_query("UPDATE reserva_mesa SET ci='$ci', nombre='$nombre', correo='$correo', direccion='$dir', telefono='$telf' WHERE login='$login'");
	mysql_close($db);
	echo mysql_error();
	echo "Password editado correctamente";
}
else
	header("Location: editar_password.php?axu=$login");
?>