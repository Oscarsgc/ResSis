<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php 
require("../db/conexion_db.php");
function obtener_fecha() {
	$entrada = $_POST["fecha"];
	if (strpos($entrada,'-')) {
		list($day, $month, $year) = sscanf($entrada, '%02d-%02d-%04d');
		$fecha = date_create("$year-$month-$day");
	} else {
		if (strpos($entrada,'/')) {
			list($day, $month, $year) = sscanf($entrada, '%02d/%02d/%04d');
			$fecha = date_create("$year-$month-$day");
		} else {
			$fecha = null;
		}
	}
	return $fecha->format('Y-m-d');
}

function obtener_hora() {
	$entrada = $_POST["hora"];
	list($horas, $minutos) = sscanf($entrada, '%02d:%02d');
	$hora = mktime($horas, $minutos);
	return date('H:i',$hora);
}

$mesa = $_POST["mesa"];
$fecha = obtener_fecha();
$hora = obtener_hora();
$res = mysql_query("SELECT num_mesa, fecha, hora FROM reserva_mesa WHERE num_mesa='$mesa' and fecha='$fecha'");
$existe = false;
while($row = mysql_fetch_row($res)){
	$diferencia = ((new DateTime($row[2]))->diff(new DateTime($hora)));
	$diferencia = (int)($diferencia->format("%H"));
	if($diferencia > -1 && $diferencia < 1)
		$existe=true;
}
if(!$existe)
{
	$nombre = $_POST["nombre"];
	$res = mysql_query("INSERT INTO reserva_mesa VALUES ('NULL', '$mesa', '$nombre', '$fecha', '$hora', '1', '0')");
	mysql_close($db);
	header("Location: index.php");
} else {
	echo "La mesa ya se encuentra reservada esa hora";
}

?>
  <br>
  <a href="index.php"> Lista de Reservas de Mesa </a>
  <br>
  <a href="salir.php"> Salir </a>