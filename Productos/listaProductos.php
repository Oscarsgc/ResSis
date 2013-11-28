<HTML>
	<HEAD>
		<TITLE>Lista de Productos</TITLE>
	</HEAD>
	<BODY>
		<?php
		function llenarTablaActivos(){
			$db = mysql_connect("localhost", "root", "root");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM producto where estado='1'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				if($row[2]==1){
					echo "<TD>"."Plato"."</TD>";
				}else{
					if($row[2]==2){
						echo "<TD>"."Bebida"."</TD>";	
					}else{
						echo "<TD>"."Guarnicion"."</TD>";	
					}
				}
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>"."<a href=\"editarProducto.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}

		function llenarTablaInactivos(){
			$db = mysql_connect("localhost", "root", "root");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM producto where estado='0'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				if($row[2]==1){
					echo "<TD>"."Plato"."</TD>";
				}else{
					if($row[2]==2){
						echo "<TD>"."Bebida"."</TD>";	
					}else{
						echo "<TD>"."Guarnicion"."</TD>";	
					}
				}
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>"."<a href=\"editarProducto.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}
		?>

		<CENTER><H1>Lista de Productos Activos</H1>

		<FORM NAME="Datos" Method="POST" Action="listaProductos.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "root");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM producto WHERE nombre like '%$buscar%' and estado='1'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				if($row[2]==1){
					echo "<TD>"."Plato"."</TD>";
				}else{
					if($row[2]==2){
						echo "<TD>"."Bebida"."</TD>";	
					}else{
						echo "<TD>"."Guarnicion"."</TD>";	
					}
				}	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>"."<a href=\"editarProducto.php?aux=$id\">Modificar</a>"."</TD>";	
				echo "</TR>";
				
			}
		}
		
		function llenarTablaBusquedaInactivos(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "root");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM producto WHERE nombre like '%$buscar%' and estado='0'", $db);
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";	
				if($row[2]==1){
					echo "<TD>"."Plato"."</TD>";
				}else{
					if($row[2]==2){
						echo "<TD>"."Bebida"."</TD>";	
					}else{
						echo "<TD>"."Guarnicion"."</TD>";	
					}
				}
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>"."<a href=\"editarProducto.php?aux=$id\">Modificar</a>"."</TD>";	
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
					llenarTablaActivos(); 
				}
				?>
			</TABLE>
			<BR><BR>
			<H1>Lista de Productos Inactivos</H1><br>

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
					llenarTablaBusquedaInactivos();
				}else{ 
					llenarTablaInactivos(); 
				}
				?>
				</TABLE>
			<br>
			<FORM Action="registrarProducto.php">
				<INPUT TYPE=Submit NAME="Insertar" VALUE="Insertar">
			</FORM>
		</CENTER>
	</BODY>
</HTML>