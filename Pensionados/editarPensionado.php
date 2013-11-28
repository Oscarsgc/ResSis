<HTML>
<HEAD>
	<TITLE>Editar Pensionado</TITLE>
</HEAD>
<BODY>
	<?php 
		$id=$_GET["aux"];
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db("restaurant",$db);
		$res=mysql_query("SELECT * FROM pensionados Where cod_pensionado='$id'", $db);
		$data = mysql_fetch_row($res);
		?>	
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
</BODY>
</HTML>