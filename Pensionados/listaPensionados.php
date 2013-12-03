<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<?php require("../db/conexion_db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<TITLE>Lista de Pensionados</TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
	</HEAD>
	<BODY>
		<?php
		function llenarTablaActivos(){
			$res=mysql_query("SELECT * FROM pensionados where estado='1' ORDER BY cod_pensionado DESC");
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
			$res=mysql_query("SELECT * FROM pensionados where estado='0' ORDER BY cod_pensionado DESC");
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
<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="listaMenuDiario.php" class="current">Menus</a></li>
      				<li><a href="#">Promociones</a></li>
      				<li><a href="../ReservaMesas/index.php">Reservas</a></li>
      				<li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Lista de Pensionados Activos<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">

		<CENTER>

		<FORM NAME="Datos" Method="POST" Action="listaPensionados.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$res=mysql_query("SELECT * FROM pensionados WHERE nombre like '%$buscar%' and estado='1' ORDER BY cod_pensionado DESC");
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
			$res=mysql_query("SELECT * FROM pensionados WHERE nombre like '%$buscar%' and estado='0' ORDER BY cod_pensionado DESC");
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

			</CENTER>
		</div>

		<div id="templatemo_container">
			<div id="templatemo_topsection">Lista Pensionados Inactivos<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
			

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
		</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>