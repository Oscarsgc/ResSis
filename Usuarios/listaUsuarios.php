<?php include ("../seguridad.php");?>
<?php require("../db/conexion_db.php"); ?>
<?php 
if ($_SESSION["rol"] != '1') {
	header("Location: ../Usuarios/login.php");
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<TITLE>Lista de Usuarios</TITLE>
			<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
	</HEAD>
	<BODY>
		<?php
		function llenarTabla($rol){
			$res=mysql_query("SELECT * FROM usuarios WHERE rol='$rol'");

			while($row=mysql_fetch_row($res)){
				$estado=$row[8];
				$login=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";
				echo "<TD>"."<a href=\"ver_perfil.php?aux=$login\">Ver Usuario</a>"."</TD>";
				if ($estado=='1') {
					echo "<TD>"."<a href=\"eliminar_usuario.php?aux=$login&estado=$estado\">Eliminar</a>"."</TD>";
				} else {
					echo "<TD>"."<a href=\"eliminar_usuario.php?aux=$login&estado=$estado\">Reincorporar</a>"."</TD>";
				}
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
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../Reservas/index.php" >Reservas</a></li>
				    <li><a href="listaUsuarios.php" class="current">Iniciar Sesion</a></li>
				    <li><a href="perfil.php">Perfil</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Lista de Usuarios<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>

		<FORM NAME="Datos" Method="POST" Action="listaUsuarios.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda($rol){
			$buscar = $_POST["buscar"];
			$res=mysql_query("SELECT * FROM usuarios WHERE rol='$rol' and nombre like '%$buscar%'");
			while($row=mysql_fetch_row($res)){
				$estado=$row[8];
				$login=$row[0];
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";
				echo "<TD>"."<a href=\"ver_perfil.php?aux=$id\">Ver Usuario</a>"."</TD>";
				if ($estado=='1') {
					echo "<TD>"."<a href=\"eliminar_usuario.php?aux=$id&estado=$estado\">Eliminar</a>"."</TD>";
				} else {
					echo "<TD>"."<a href=\"eliminar_usuario.php?aux=$id&estado=$estado\">Reincorporar</a>"."</TD>";
				}
				echo "</TR>";
				
			}
		}
		
		?>
		<div id="templatemo_topsection">Administradores<br></div>
			<TABLE BORDER=3>
				<TR>
					<TD>Login</TD>
					<TD>Ci</TD>
					<TD>Nombre</TD>
					<TD>Correo</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda(1);
				}else{ 
					llenarTabla(1); 
				}
				?>
			</TABLE>
			<BR><BR>
			<div id="templatemo_topsection">Funcionarios<br></div>
			<TABLE BORDER=3>
				<TR>
					<TD>Login</TD>
					<TD>Ci</TD>
					<TD>Nombre</TD>
					<TD>Correo</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda(2);
				}else{ 
					llenarTabla(2); 
				}
				?>
			</TABLE>
			<BR><BR>
			<div id="templatemo_topsection">Clientes<br></div>
			<TABLE BORDER=3>
				<TR>
					<TD>Login</TD>
					<TD>Ci</TD>
					<TD>Nombre</TD>
					<TD>Correo</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda(3);
				}else{ 
					llenarTabla(3); 
				}
				?>
			</TABLE>
			<BR><BR>
			<FORM Action="crearUsuario.php">
				<INPUT TYPE=Submit NAME="Insertar" VALUE="Insertar">
			</FORM>
	</CENTER>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>