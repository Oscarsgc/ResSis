<HTML>
	<HEAD>
	<TITLE>Registrar Pensionado</TITLE>
	</HEAD>
	<BODY>
		<FORM Method="POST" Action="controlAgregarPensionado.php" NAME="registro">
		Ci: <INPUT TYPE="Text" NAME="ci"><BR><BR>
		Nombre: <INPUT TYPE="Text" NAME="nombre"><BR><BR>
		Direccion: <INPUT TYPE="Text" NAME="direccion"><BR><BR>
		Telefono: <INPUT TYPE="Text" NAME="telefono"><BR><BR>
		<INPUT TYPE=Hidden NAME="estado" value='1'><BR><BR>
		<INPUT TYPE=Submit NAME="ingresar" VALUE="Ingresar">
				<INPUT TYPE=Reset NAME="borrar" VALUE="Borrar">
				<A HREF="listaPensionados.php">Volver</A>
				<BR>
		</FORM>
	</BODY>
</HTML>