<HTML>
	<HEAD>
		<TITLE>Lista de Pensionados</TITLE>
	</HEAD>
	<BODY>
		<?php
		function llenarTablaActivos(){
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM pensionados where estado='1'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";
				echo "<TD>"."<a href=\"editarPensionado.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}

		function llenarTablaInactivos(){
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM pensionados where estado='0'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";
				echo "<TD>".$row[4]."</TD>";		
				echo "<TD>"."<a href=\"editarPensionado.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}
		?>

		<CENTER><H1>Lista de Pensionados Activos</H1>

		<FORM NAME="Datos" Method="POST" Action="listaPensionados.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM pensionados WHERE nombre like '%$buscar%' and estado='1'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";	
				echo "<TD>"."<a href=\"editarPensionado.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}
		
		function llenarTablaBusquedaInactivos(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM pensionados WHERE nombre like '%$buscar%' and estado='0'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";	
				echo "<TD>"."<a href=\"editarPensionado.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}

		
		?>
			<TABLE BORDER=3>
				<TR>
					<TD>Codigo</TD>
					<TD>Ci</TD>
					<TD>Nombre</TD>
					<TD>Direccion</TD>
					<TD>Telefono</TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda();
				}else{ 
					llenarTablaActivos(); 
				}
				?>
			</TABLE>
			<BR><BR>
			<H1>Lista de Pensionados Inactivos</H1><br>

				<TABLE BORDER=3>
				<TR>
					<TD>Codigo</TD>
					<TD>Ci</TD>
					<TD>Nombre</TD>
					<TD>Direccion</TD>
					<TD>Telefono</TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusquedaInactivos();
				}else{ 
					llenarTablaInactivos(); 
				}
				?>
				</TABLE>
			<br>
			<FORM Action="registrarPensionado.php">
				<INPUT TYPE=Submit NAME="Insertar" VALUE="Insertar">
			</FORM>
		</CENTER>
	</BODY>
</HTML>