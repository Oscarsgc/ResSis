<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		<TITLE>Lista de ordenes</TITLE>
	<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
		<?php require("../db/conexion_db.php");

		function mostrar_datos($res) {
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				$estado=$row[4];
				echo "<TR>";
				echo "<TD>".$row[1]."</TD>";
				echo "<TD>".$row[2]."</TD>";
				echo "<TD>".date_create($row[3])->format('d-m-Y H:i')."</TD>";
				echo "<TD>"."<a href=\"ver_orden.php?aux=$id\">Ver</a>"."</TD>";
				if ($row[4])
					echo "<TD>"."<a href=\"cancelar_orden.php?aux=$id&estado=$estado\">Cancelar</a>"."</TD>";
				else
					echo "<TD>"."<a href=\"cancelar_orden.php?aux=$id&estado=$estado\">Restablecer</a>"."</TD>";
				echo "</TR>";
			}
		}

		function obtener_datos($mesa, $nombre, $estado){
			if (!is_null($mesa)) {
				$res=mysql_query("SELECT * FROM orden where estado='$estado' and num_mesa = '$mesa' ORDER BY cod_orden DESC");
			} else {
				if (!is_null($nombre)){
					$res=mysql_query("SELECT * FROM orden where estado='$estado' and nombre_cliente like '%$nombre%' ORDER BY cod_orden DESC");
				} else {
					$res=mysql_query("SELECT * FROM orden where estado='$estado' ORDER BY cod_orden DESC");
				}
			}
			mostrar_datos($res);
		}

		function llenarTablas($estado){
			if(isset($_GET["Buscar"])){
				if(isset($_GET["mesa"])){
					obtener_datos($_GET["mesa"], null, $estado);
				} else {
					if(isset($_GET["nombre"])){
						obtener_datos(null, $_GET["nombre"], $estado);
					} else {
						obtener_datos(null, null, $estado);
					}
				} 
			} else {
				obtener_datos(null, null, $estado);
			}
		}
		?>
	</HEAD>
	<BODY>
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
			
			<BR>
		
	
		<div id="templatemo_content_section">

<BR><BR><CENTER>

		<FORM NAME="Datos1" Method="get" Action="index.php">
			Nombre de orden: <INPUT TYPE=Text NAME="nombre"><BR><br>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<FORM NAME="Datos2" Method="get" Action="index.php">
			Numero de mesa: <INPUT TYPE=Text NAME="mesa"><BR><br>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
		</div>
		</CENTER>
		<div id="templatemo_topsection">Lista de Ordenes<br></div>

<div id="templatemo_content_section">
<CENTER>
			<TABLE BORDER=3>
				<TR>
					<TH>Numero Mesa</TH>
					<TH>Nombre de orden</TH>
					<TH>Fecha</TH>
					<TH></TH>
					<TH></TH>
				</TR>
				<?php
					llenarTablas(1);
				?>
			</TABLE>
			</CENTER>
			<BR><BR>
			</div>
			<div id="templatemo_container">
			<div id="templatemo_topsection">Lista de Ordenes canceladas<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
			
			
<CENTER>
			<TABLE BORDER=3>
				<TR>
					<TH>Numero Mesa</TH>
					<TH>Nombre de orden</TH>
					<TH>Fecha</TH>
					<TH></TH>
					<TH></TH>
				</TR>
				<?php
					llenarTablas(0);
				?>
			</TABLE>
			<br>
			<form action="registrar_orden.php">
				<input type = "submit" name="Registrar" value = "Registrar">
			</form>
			<a href="../salir.php">Salir</a>
		</CENTER>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>