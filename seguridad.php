<?php
//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($_SESSION["autentificado"] != "si") {
	//si no existe, envio a la página de autentificacion
	header("Location: ../Usuarios/login.php");
	//ademas salgo de este script
	exit();
}	
?>