<?php include ("../seguridad.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<TITLE>Lista de pedidos</TITLE>
			<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
		<?php require("../db/conexion_db.php");

		function mostrar_datos($res) {
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				$estado=$row[6];
				echo "<TR>";
				echo "<TD>".$row[2]."</TD>";
				echo "<TD>".$row[1]."</TD>";
				echo "<TD>".substr($row[3], 0, 20)."..."."</TD>";
				echo "<TD>".$row[4]."</TD>";
				echo "<TD>".date_create($row[5])->format('d-m-Y H:i')."</TD>";
				echo "<TD>"."<a href=\"ver_pedido.php?aux=$id\">Ver</a>"."</TD>";
				if (!$row[7]){
					if($row[6])
						echo "<TD>"."<a href=\"cancelar_pedido.php?aux=$id&estado=$estado\">Cancelar</a>"."</TD>";
					else
						echo "<TD>"."<a href=\"cancelar_pedido.php?aux=$id&estado=$estado\">Restablecer</a>"."</TD>";
				}
				echo "</TR>";
			}
		}

		function obtener_datos($nit, $nombre, $estado, $entregado){
			$login = $_SESSION["usuario"];
			if (!is_null($nit)) {
				$res=mysql_query("SELECT * FROM pedido where estado='$estado' and entregado='$entregado' and usuario='$login' and nit = '$nit' ORDER BY cod_pedido DESC");
			} else {
				if (!is_null($nombre)){
					$res=mysql_query("SELECT * FROM pedido where estado='$estado' and entregado='$entregado' and usuario='$login' and nombre like '%$nombre%' ORDER BY cod_pedido DESC");
				} else {
					$res=mysql_query("SELECT * FROM pedido where estado='$estado' and entregado='$entregado' and usuario='$login' ORDER BY cod_pedido DESC");
				}
			}
			mostrar_datos($res);
		}

		function llenarTablas($estado, $entregado){
			if(isset($_GET["Buscar"])){
				if(isset($_GET["nit"])){
					obtener_datos($_GET["nit"], null, $estado, $entregado);
				} else {
					if(isset($_GET["nombre"])){
						obtener_datos(null, $_GET["nombre"], $estado, $entregado);
					} else {
						obtener_datos(null, null, $estado, $entregado);
					}
				} 
			} else {
				obtener_datos(null, null, $estado, $entregado);
			}
		}
		?>
	</HEAD>
	<BODY>
<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="index.php" class="current">Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
				    <li><a href="../Usuarios/perfil.php">Perfil</a></li>
      			</ul>
			 </div>
			
			<BR>
		
	
		<div id="templatemo_content_section">

		<CENTER>

		<h3> Usuario: <?php $_SESSION["usuario"]; ?> </h3>

		<FORM NAME="Datos1" Method="get" Action="index.php">
			Nombre: <INPUT TYPE=Text NAME="nombre"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<FORM NAME="Datos2" Method="get" Action="index.php">
			Nit: <INPUT TYPE=Text NAME="nit"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
			</div>
			<div id="templatemo_topsection">Lista de Pedidos<br></div>
			<div id="templatemo_content_section">
			<CENTER>
			<TABLE BORDER=3>
				<TR>
					<TH>Nit</TH>
					<TH>Nombre</TH>
					<TH>Direccion</TH>
					<TH>Telefono</TH>
					<TH>Fecha</TH>
					<TH></TH>
					<TH></TH>
				</TR>
				<?php
					llenarTablas(1,0);
				?>
			</TABLE>
			<BR><BR>
			</div>
			<div id="templatemo_topsection">Lista de Pedidos Entregados<br></div>
			<div id="templatemo_content_section">
			<TABLE BORDER=3>
				<TR>
					<TH>Nit</TH>
					<TH>Nombre</TH>
					<TH>Direccion</TH>
					<TH>Telefono</TH>
					<TH>Fecha</TH>
					<TH></TH>
				</TR>
				<?php
					llenarTablas(1,1);
				?>
			</TABLE>
			<br><br>
			<div id="templatemo_topsection">Lista de Pedidos Cancelados<br></div>
			<div id="templatemo_content_section">
			<TABLE BORDER=3>
				<TR>
					<TH>Nit</TH>
					<TH>Nombre</TH>
					<TH>Direccion</TH>
					<TH>Telefono</TH>
					<TH>Fecha</TH>
					<TH></TH>
					<TH></TH>
				</TR>
				<?php
					llenarTablas(0,0);
					llenarTablas(0,1);
				?>
			</TABLE>
			<br>
			<form action="registrar_pedido.php">
				<input type = "submit" name="Registrar" value = "Registrar">
			</form>
			<a href="../salir.php">Salir</a>
		</CENTER>
		</div>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>