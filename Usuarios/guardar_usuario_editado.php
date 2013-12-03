<?php include ("../seguridad.php");?>
<?php 
require("../db/conexion_db.php");
$login = $_POST["login"];
$nombre = $_POST["nombre"];
$ci = $_POST["ci"];
$dir = $_POST["dir"];
$correo = $_POST["correo"];
$telf = $_POST["telf"];
$res = mysql_query("UPDATE usuarios SET ci='$ci', nombre='$nombre', correo='$correo', direccion='$dir', telefono='$telf' WHERE login='$login'");
mysql_close($db);
echo mysql_error();
header("Location: perfil.php");
?>