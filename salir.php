<?php include ("seguridad.php");?>
<?php
$_SESSION["autentificado"]="no";
session_destroy();
header("Location: index.php");
?>
