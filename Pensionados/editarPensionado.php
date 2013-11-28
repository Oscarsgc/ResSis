<HTML>
<HEAD>
	<TITLE>Editar Pensionado</TITLE>
</HEAD>
<BODY>
	<?php 
		$id=$_GET["aux"];
		$db = mysql_connect("localhost", "root", "root");
		mysql_select_db("restaurant",$db);
		$res=mysql_query("SELECT * FROM pensionados Where cod_pensionado='$id'", $db);
		$data = mysql_fetch_array($res);
		?>	
		<form action="guardarPensionadoEditado.php" method="POST">
  			Codigo: <input type="text" disabled="true" name="codigo" value="<?php echo $data[cod_pensionado]?>"/> </br>
  			Ci: <input type="text" name="ci" value="<?php echo $data[ci]?>"/> </br>
  			Nombre: <input type="text" name="nombre" value="<?php echo $data[nombre]?>"/> </br>
  			Direccion: <input type="text" name="direccion" value="<?php echo $data[direccion]?>"/></br>
  			Telefono: <input type="text" name="telefono" value="<?php echo $data[telefono]?>"/></br>
  			Estado: <input type="text" name="estado" value="<?php echo $data[estado]?>"/></br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="listaPensionados.php">
			<input type = "submit" name="Cancelar" value = "Cancelar">
		</form>
</BODY>
</HTML>