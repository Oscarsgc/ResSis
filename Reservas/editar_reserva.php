<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
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



	<CENTER>
	<?php 
		$id=$_GET["aux"];
		$res=mysql_query("SELECT * FROM reserva_mesa Where cod_reserva_mesa='$id'");
		$data = mysql_fetch_row($res);
	?>
		<form action="guardar_reserva_editada.php" method="POST">
  			<input type="hidden" name="codigo" value="<?php echo $data[0]; ?>"/> </br>
  			Numero de Mesa: <input type="text" name="mesa" value="<?php echo $data[1]; ?>"/> </br>
  			Nombre de Reserva: <input type="text" name="nombre" value="<?php echo $data[2]; ?>"/> </br>
  			Fecha: <input type="date" name="fecha" value="<?php echo date_create($data[3])->format('d-m-Y'); ?>"/></br>
  			Hora: <input type="time" name="hora" value="<?php echo $data[4]; ?>"><br><br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="listaProductos.php">
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