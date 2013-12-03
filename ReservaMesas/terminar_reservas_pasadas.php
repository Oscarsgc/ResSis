<?php
	$now = new DateTime();
	date_timezone_set($now, timezone_open('America/La_Paz'));
	$fecha = $now->format('Y-m-d');
	$hora = $now->format('H:i');
	$res = mysql_query("UPDATE reserva_mesa SET terminada='1' WHERE estado='1' and terminada='0' and date(fecha)<date('$fecha')");
?>