<HTML>
<HEAD>
	<TITLE>Editar Reserva de Mesa</TITLE>
	<?php require("../db/conexion_db.php") ?>
</HEAD>
<BODY>
	<h1> Editar Reserva de Mesa </h1>
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
</BODY>
</HTML>