<HTML>
	<HEAD>
		<TITLE>INSERTAR USUARIO</TITLE>
	</HEAD>
	<BODY>

		<MARQUEE><H1>INGRESO DE DATOS</H1></MARQUEE>
		<FORM NAME="Datos" Action="controlCreacionUsuarios.php" Method="POST">
			Login: <INPUT TYPE=Text NAME="usuario" VALUE=""><BR>
			Contrasenia:<INPUT TYPE=Password NAME="contrasena" VALUE=""><BR>
			Nombre: <INPUT TYPE=Text NAME="nombre" VALUE=""><BR>
			<!--Telefono: <INPUT TYPE=Text NAME="telefono" VALUE=""><BR>
			Direccion: <INPUT TYPE=Text NAME="direccion" VALUE=""><BR>
			Sexo:<INPUT TYPE=Text NAME="sexo" VALUE="">Inserte M Masculino, F Femenino-->
			<BR>	
			<INPUT TYPE=Submit NAME="Guardar" VALUE="Guardar"><DD></DD>
		</FORM>
		<FORM Name= "Datos" Action="listaUsuarios.php">
			<INPUT TYPE=Submit NAME="Usuarios" VALUE="Lista Usuario" ><BR>
		</FORM>
	</BODY>
</HTML>