<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
		<title>Autentificacion</title>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
</head>
<body>
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
				    <li><a href="perfil.php">Perfil</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Iniciar sesion<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
<CENTER>
<form action="controlInicioSesion.php" method="POST">
<table align="center" width="225" cellspacing="2" cellpadding="2" border="0">
<tr>
    <td colspan="2" align="center" 
	<?php if (isset($_GET["errorusuario"])=="si"){?>
		bgcolor=red><span style="color:ffffff"><b>Datos incorrectos</b></span>
	<?php }else{?>
		bgcolor=#cccccc>Introduce tus datos de acceso
	<?php } ?></td>
</tr>
<tr>
    <td align="right">Usuario:</td>
    <td><input type="Text" name="usuario" size="8" maxlength="50"></td>
</tr>
<tr>
    <td align="right">Password:</td>
    <td><input type="password" name="contrasena" size="8" maxlength="50"></td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td>
</tr>
</table>
</form>
<FORM action="crearUsuario.php" method="POST">
<input type=submit id="Registrarse" name="Registrarse" value="Registrarse">
</FORM>
<br>
<br></CENTER>
<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
</body>
</html>

