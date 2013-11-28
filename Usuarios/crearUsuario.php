<HTML>
	<HEAD>
		<TITLE>INSERTAR USUARIO</TITLE>
	</HEAD>
	<BODY>

		<MARQUEE><H1>INGRESO DE DATOS</H1></MARQUEE>
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
	</BODY>
</HTML>