<?php include ("seguridad.php");?>
<?php
session_destroy();
header("Location: index.php");
?>
