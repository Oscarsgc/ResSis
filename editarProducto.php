<HTML>
<HEAD>
	<TITLE>Editar Producto</TITLE>
</HEAD>
<BODY>
	<?php 
		$id=$_GET["aux"];
		$db = mysql_connect("localhost", "root", "root");
		mysql_select_db("restaurant",$db);
		$res=mysql_query("SELECT * FROM producto Where cod_producto='$id'", $db);
		$data = mysql_fetch_array($res);
		?>	
		<form action="guardarProductoEditado.php" method="POST">
  			Codigo: <input type="text" name="codigo" value="<?php echo $data[cod_producto]?>"/> </br>
  			Nombre: <input type="text" name="nombre" value="<?php echo $data[nombre]?>"/> </br>
  			Tipo: <input type="text" name="tipo" value="<?php echo $data[tipo]?>"/></br>  			
  			Precio: <input type="text" name="precio" value="<?php echo $data[precio]?>"/></br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="tabla.php">
			<input type = "submit" name="Cancelar" value = "Cancelar">
		</form>
</BODY>
</HTML>