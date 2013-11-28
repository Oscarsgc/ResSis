<?php include ("seguridad.php");?>
<?php 
$mesa = $_POST["mesa"];
$hora = $_POST["hora"];
$fecha = $_POST["fecha"];
$db = mysql_connect("localhost", "root", "");
mysql_select_db("prueba",$db);
$res = mysql_query("SELECT num_mesa, fecha, hora FROM reserva_mesa WHERE num_mesa='$mesa' and fecha='$fecha'", $db);
$existe = false;
while($row = mysql_fetch_row($res)){
	$diferencia = ($row[2] - $hora) / 60;
	if($diferencia < 60 || $diferencia > 60)
		$existe=true;
}
if(!$existe)
{
	$nombre = $_POST["nombre"];
	$estado = true;
	$res = mysql_query("INSERT INTO reserva_mesa (num_mesa, nombre, fecha, hora, estado) VALUES ('$mesa', '$nombre', '$fecha', '$hora', '$estado')", $db);
	echo "Reserva guardada correctamente";
	mysql_close($db);
}
else{
	echo "La mesa ya se encuentra reservada esa hora";
}
?>
  <br>
  <a href="lista_reservas.php"> Lista de Reservas de Mesa </a>
  <br>
  <a href="salir.php"> Salir </a>