<HTML>
	<HEAD>
	<TITLE>Registrar Producto</TITLE>
	</HEAD>
	<BODY>
		<FORM Method="POST" Action="controlAgregarProducto.php" NAME="registro">
		Codigo: <INPUT TYPE="Text" NAME="codigo"><BR><BR>
		Nombre: <INPUT TYPE="Text" NAME="nombre"><BR><BR>
		Tipo: <INPUT TYPE="Text" NAME="tipo"><BR><BR>
		Precio: <INPUT TYPE="Text" NAME="precio"><BR><BR>
		<INPUT TYPE=Hidden NAME="estado" value='1'><BR><BR>
		<INPUT TYPE=Submit NAME="ingresar" VALUE="Ingresar">
				<INPUT TYPE=Reset NAME="borrar" VALUE="Borrar">
				<A HREF="listaProductos.php">Volver</A>
				<BR>
		</FORM>
	</BODY>
</HTML>