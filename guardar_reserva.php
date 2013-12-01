<?php require("conexion_db.php"); ?>
<?php 
function obtener_fecha() {
	$fecha = $_POST["fecha"];
	$fecha = explode('-', $fecha);
}

function obtener_hora() {
	$hora = $_POST["hora"];
}

$mesa = $_POST["mesa"];
$res = mysql_query("SELECT num_mesa, fecha, hora FROM reserva_mesa WHERE num_mesa='$mesa' and fecha='$fecha'");
$existe = false;
$row = mysql_fetch_row($res);
while($row = mysql_fetch_row($res)){
	$diferencia = ($row[2] - $hora) / 60;
	if($diferencia < 60 || $diferencia > 60)
		$existe=true;
}
if(!$existe)
{
	$nombre = $_POST["nombre"];
	$estado = true;
	$res = mysql_query("INSERT INTO reserva_mesa (num_mesa, nombre, fecha, hora, estado) VALUES ('$mesa', '$nombre', '$fecha', '$hora', '$estado')");
	echo "Reserva guardada correctamente";
	mysql_close($db);
} else {
	echo "La mesa ya se encuentra reservada esa hora";
}

?>
  <br>
  <a href="lista_reservas.php"> Lista de Reservas de Mesa </a>
  <br>
  <a href="salir.php"> Salir </a>