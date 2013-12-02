<HTML>
	<HEAD>
		<TITLE>Lista de ordenes</TITLE>
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
					echo "<TD>"."<a href=\"cancelar_orden.php?aux=$id&estado=$estado\">Reestablecer</a>"."</TD>";
				echo "</TR>";
			}
		}

		function obtener_datos($mesa, $nombre, $estado){
			if (!is_null($mesa)) {
				$res=mysql_query("SELECT * FROM orden where estado='$estado' and num_mesa = '$mesa'");
			} else {
				if (!is_null($nombre)){
					$res=mysql_query("SELECT * FROM orden where estado='$estado' and nombre_cliente like '%$nombre%'");
				} else {
					$res=mysql_query("SELECT * FROM orden where estado='$estado'");
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

		<CENTER><H1>Lista de ordenes</H1>

		<FORM NAME="Datos1" Method="get" Action="index.php">
			Nombre de orden: <INPUT TYPE=Text NAME="nombre"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<FORM NAME="Datos2" Method="get" Action="index.php">
			Numero de mesa: <INPUT TYPE=Text NAME="mesa"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
			<H3>Lista de Ordenes</H3><br>
			<TABLE BORDER=3>
				<TR>
					<TD>Numero Mesa</TD>
					<TD>Nombre de orden</TD>
					<TD>Fecha</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
					llenarTablas(1);
				?>
			</TABLE>
			<BR><BR>
			<H3>Lista de Ordenes Canceladas</H3><br>

			<TABLE BORDER=3>
				<TR>
					<TD>Numero Mesa</TD>
					<TD>Nombre de orden</TD>
					<TD>Fecha</TD>
					<TD></TD>
					<TD></TD>
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
	</BODY>
</HTML>