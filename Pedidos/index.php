<HTML>
	<HEAD>
		<TITLE>Lista de pedidos</TITLE>
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
				if ($row[6])
					echo "<TD>"."<a href=\"cancelar_pedido.php?aux=$id&estado=$estado\">Cancelar</a>"."</TD>";
				else
					echo "<TD>"."<a href=\"cancelar_pedido.php?aux=$id&estado=$estado\">Reestablecer</a>"."</TD>";
				echo "</TR>";
			}
		}

		function obtener_datos($nit, $nombre, $estado){
			if (!is_null($nit)) {
				$res=mysql_query("SELECT * FROM pedido where estado='$estado' and nit = '$nit'");
			} else {
				if (!is_null($nombre)){
					$res=mysql_query("SELECT * FROM pedido where estado='$estado' and nombre like '%$nombre%'");
				} else {
					$res=mysql_query("SELECT * FROM pedido where estado='$estado'");
				}
			}
			mostrar_datos($res);
		}

		function llenarTablas($estado){
			if(isset($_GET["Buscar"])){
				if(isset($_GET["nit"])){
					obtener_datos($_GET["nit"], null, $estado);
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

		<CENTER><H1>Lista de pedidos</H1>

		<FORM NAME="Datos1" Method="get" Action="index.php">
			Nombre: <INPUT TYPE=Text NAME="nombre"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<FORM NAME="Datos2" Method="get" Action="index.php">
			Nit: <INPUT TYPE=Text NAME="nit"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
			<H3>Lista de pedidos</H3><br>
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
					llenarTablas(1);
				?>
			</TABLE>
			<BR><BR>
			<H3>Lista de pedidos Canceladas</H3><br>

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
					llenarTablas(0);
				?>
			</TABLE>
			<br>
			<form action="registrar_pedido.php">
				<input type = "submit" name="Registrar" value = "Registrar">
			</form>
			<a href="../salir.php">Salir</a>
		</CENTER>
	</BODY>
</HTML>