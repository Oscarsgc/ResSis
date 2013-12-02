<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<TITLE>Editar Pensionado</TITLE>
	<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
</HEAD>
<BODY>
	<?php 
		$id=$_GET["aux"];
		$db = mysql_connect("localhost", "root", "root");
		mysql_select_db("restaurant",$db);
		$res=mysql_query("SELECT * FROM pensionados Where cod_pensionado='$id'", $db);
		$data = mysql_fetch_row($res);
		?>	
		<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="listaMenuDiario.php" class="current">Menus</a></li>
      				<li><a href="#">Promociones</a></li>
      				<li><a href="../ReservaMesas/index.php">Reservas</a></li>
      				<li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Pensionado<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
		<form action="guardarPensionadoEditado.php" method="POST">
  			Codigo: <?php echo $data[0]?> <input type="hidden" name="codigo" value="<?php echo $data[0]?>"/> </br>
  			Ci: <input type="text" name="ci" value="<?php echo $data[1]?>"/> </br>
  			Nombre: <input type="text" name="nombre" value="<?php echo $data[2]?>"/> </br>
  			Direccion: <input type="text" name="direccion" value="<?php echo $data[3]?>"/></br>
  			Telefono: <input type="text" name="telefono" value="<?php echo $data[4]?>"/></br>
  			Estado: <input type="text" name="estado" value="<?php echo $data[5]?>"/></br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="listaPensionados.php">
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