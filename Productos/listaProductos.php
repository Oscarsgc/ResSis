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
	
			<TITLE>Lista de Productos</TITLE>
			<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
	</HEAD>
	<BODY>
		<?php
		function llenarTablaActivos(){
			$res=mysql_query("SELECT * FROM producto where estado='1' ORDER BY cod_producto DESC");
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
			$res=mysql_query("SELECT * FROM producto where estado='0' ORDER BY cod_producto DESC");
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
		<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php" >Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="listaProductos.php" class="current">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Lista de Productos Activos<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">


		<CENTER>

		<FORM NAME="Datos" Method="POST" Action="listaProductos.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
</CENTER>
		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$res=mysql_query("SELECT * FROM producto WHERE nombre like '%$buscar%' and estado='1' ORDER BY cod_producto DESC");
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
			$res=mysql_query("SELECT * FROM producto WHERE nombre like '%$buscar%' and estado='0' ORDER BY cod_producto DESC");
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
		
		

		<CENTER>
		<BR>
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
			</CENTER>
			</div>

		<div id="templatemo_container">
			<div id="templatemo_topsection">Lista Productos Inactivos<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
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
		
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>