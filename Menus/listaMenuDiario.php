<HTML>
	<HEAD>
		<TITLE>
			Menus diarios
		</TITLE>
	</HEAD>
	<BODY>
	<?php require("../conexion_db.php"); ?>
		<?php
		function llenarTablaActivos(){
			$res=mysql_query("SELECT MD.dia, P.cod_producto, P.nombre, P.precio FROM menu_dia MD, producto P, producto_menu_dia PM WHERE ((MD.cod_menu_dia= PM.cod_menu_dia) AND (P.cod_producto=PM.cod_producto))");
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				//echo "<TR>";
				//echo "<TH>".$row[0]."</TH>";	
				//echo "</TR>";			
				echo "<TR>";
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";
				echo "<TD>".$row[3]."</TD>";
				echo "</TR>";
				
			}
		}

		/*function llenarTablaInactivos(){
			$res=mysql_query("SELECT * FROM menu_dia where estado='0'", $db);
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
		}*/
		?>

		<CENTER><H1>Lista de Menus Activos</H1>

		<FORM NAME="Datos" Method="POST" Action="listaPensionados.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<!--?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
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

		
		?-->
		<style type="text/css">
.tg-table-paper { border-collapse: collapse; border-spacing: 0; }
.tg-table-paper td, .tg-table-paper th { background-color: #F3F5EF; border: 1px #bbb solid; color: #333; font-family: sans-serif; font-size: 100%; padding: 10px; vertical-align: top; }
.tg-table-paper .tg-even td  { background-color: #F0F0E5; }
.tg-table-paper th  { background-color: #EAE2CF; color: #333; font-size: 110%; font-weight: bold; }
.tg-table-paper tr:hover td, .tg-table-paper tr.even:hover td  { color: #222; background-color: #FFFBEF; }
.tg-bf { font-weight: bold; } .tg-it { font-style: italic; }
.tg-left { text-align: left; } .tg-right { text-align: right; } .tg-center { text-align: center; }
</style>

		
			<TABLE BORDER=3 class="tg-table-paper">
  			<tr>
    			<th colspan="3"></th>
  			</tr>
  			<tr class="tg-table-paper" >
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
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
			<H1>Lista de Menus Inactivos</H1><br>

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