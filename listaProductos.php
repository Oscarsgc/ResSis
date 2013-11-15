<HTML>
	<HEAD>
		<TITLE>Lista de Usuarios</TITLE>
	</HEAD>
	<BODY>
		<?php
		function llenarTabla(){
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM productos", $db);
			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "</TR>";
				
			}
		}
		?>

		<CENTER><H1>Lista de Usuarios</H1>

		<FORM NAME="Datos" Method="POST" Action="listaProductos.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM productos WHERE nombre like '%$buscar%'", $db);
			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "</TR>";
				
			}
		}
		
		
		?>
			<TABLE BORDER=3>
				<TR>
					<TD>Codigo</TD>
					<TD>Nombre</TD>
					<TD>Tipo</TD>
					<TD>Precio Unitario</TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda();
				}else{ 
					llenarTabla(); 
				}
				?>
			</TABLE>
			<BR><BR>
			<FORM Action="registrarProducto.php">
				<INPUT TYPE=Submit NAME="Insertar" VALUE="Insertar">
			</FORM>
		</CENTER>
	</BODY>
</HTML>