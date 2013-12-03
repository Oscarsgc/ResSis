<?php include ("../seguridad.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

	<TITLE>Editar Reserva de Mesa</TITLE>
	<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />


		<script type="text/javascript" src="../CSS/reflection.js"></script>
	<?php require("../db/conexion_db.php") ?>
</HEAD>
<BODY>
<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php" >Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="index.php" class="current">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Editar Reserva de mesa<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">

			<?php $id=$_SESSION["usuario"] ?>

	<CENTER>
		<form action="guardar_password.php" method="POST">
  			Login: <?php echo $id; ?><input type="hidden" name="login" value="<?php echo $id; ?>"/> </br>
  			Password: <input type="password" name="antiguo"/> </br>
  			Nuevo Password: <input type="password" name="nuevo"/> </br>
  			Confirmacion Password: <input type="password" name="conf"/></br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="perfil.php" method="get">
			<input type="hidden" name="aux" value="<?php echo $id; ?>"/>
			<input type = "submit" name="Cancelar" value = "Cancelar">
		</form>
		</CENTER>
		</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
</BODY>
</HTML>