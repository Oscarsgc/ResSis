<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<TITLE>INSERTAR USUARIO</TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
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
				    <li><a href="../Reservas/index.php" >Reservas</a></li>
				    <li><a href="listaUsuarios.php" class="current">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Crear Usuarios<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
<CENTER>
		<FORM NAME="Datos" Action="controlCreacionUsuarios.php" Method="POST">
			Login: <INPUT TYPE=Text NAME="usuario" VALUE=""><BR>
			Password:<INPUT TYPE=Password NAME="contrasena" VALUE=""><BR>
			Ci: <INPUT TYPE=Text NAME="ci" VALUE=""><BR>
			Nombre: <INPUT TYPE=Text NAME="nombre" VALUE=""><BR>
			Correo: <INPUT TYPE=Text NAME="correo" VALUE=""><BR>
			<INPUT TYPE=Hidden NAME="rol" VALUE="0">
			<INPUT TYPE=Hidden NAME="estado" VALUE="0">
			<BR>	
			<INPUT TYPE=Submit NAME="Guardar" VALUE="Guardar"><DD></DD>
		</FORM>
		<FORM Name= "Datos" Action="listaUsuarios.php">
			<INPUT TYPE=Submit NAME="Usuarios" VALUE="Lista Usuario" ><BR>
		</FORM>
		</CENTER>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>