<HTML>
	<HEAD>
		<TITLE>Lista de Reservas</TITLE>
		<?php require("../db/conexion_db.php");
		require("terminar_reservas_pasadas.php");

		function mostrar_datos($res) {
			while($row=mysql_fetch_row($res)){
				$id=$row[0];
				$estado=$row[5];
				echo "<TR>";
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".date_create($row[3])->format('d-m-Y')."</TD>";
				echo "<TD>".$row[4]."</TD>";
				echo "<TD>"."<a href=\"editar_reserva.php?aux=$id\">Modificar</a>"."</TD>";
				if ($row[5] && !$row[6])
					echo "<TD>"."<a href=\"cancelar_reserva.php?aux=$id&estado=$estado\">Cancelar</a>"."</TD>";
				else
					if (!$row[6])
						echo "<TD>"."<a href=\"cancelar_reserva.php?aux=$id&estado=$estado\">Reestablecer</a>"."</TD>";
				echo "</TR>";
			}
		}

		function obtener_datos($mesa, $nombre, $estado, $terminado){
			if (!is_null($mesa)) {
				$res=mysql_query("SELECT * FROM reserva_mesa where estado='$estado' and terminada='$terminado' and num_mesa = '$mesa'");
			} else {
				if (!is_null($nombre)){
					$res=mysql_query("SELECT * FROM reserva_mesa where estado='$estado' and terminada='$terminado' and nombre_cliente like '%$nombre%'");
				} else {
					$res=mysql_query("SELECT * FROM reserva_mesa where estado='$estado' and terminada='$terminado'");
				}
			}
			mostrar_datos($res);
		}

		function llenarTablas($estado, $terminado){
			if(isset($_GET["Buscar"])){
				if(isset($_GET["mesa"])){
					obtener_datos($_GET["mesa"], null, $estado, $terminado);
				} else {
					if(isset($_GET["nombre"])){
						obtener_datos(null, $_GET["nombre"], $estado, $terminado);
					} else {
						obtener_datos(null, null, $estado, $terminado);
					}
				} 
			} else {
				obtener_datos(null, null, $estado, $terminado);
			}
		}
		?>
	</HEAD>
	<BODY>

		<CENTER><H1>Reservas de Mesas</H1>

		<FORM NAME="Datos1" Method="get" Action="index.php">
			Nombre de reserva: <INPUT TYPE=Text NAME="nombre"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<FORM NAME="Datos2" Method="get" Action="index.php">
			Numero de mesa: <INPUT TYPE=Text NAME="mesa"><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>
			<H3>Lista de Reservas Actuales</H3><br>
			<TABLE BORDER=3>
				<TR>
					<TD>Numero Mesa</TD>
					<TD>Nombre de Reserva</TD>
					<TD>Fecha</TD>
					<TD>Hora</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
					llenarTablas(1,0);
				?>
			</TABLE>
			<BR><BR>
			<H3>Lista de Reservas Pasadas</H3><br>

			<TABLE BORDER=3>
				<TR>
					<TD>Numero Mesa</TD>
					<TD>Nombre de Reserva</TD>
					<TD>Fecha</TD>
					<TD>Hora</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
					llenarTablas(1,1);
				?>
			</TABLE>
			<BR><BR>
			<H3>Lista de Reservas Canceladas</H3><br>

			<TABLE BORDER=3>
				<TR>
					<TD>Numero Mesa</TD>
					<TD>Nombre de Reserva</TD>
					<TD>Fecha</TD>
					<TD>Hora</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
					llenarTablas(0,0);
					llenarTablas(0,1);
				?>
			</TABLE>
			<br>
			<form action="reservar_mesa.html">
				<input type = "submit" name="Registrar" value = "Registrar">
			</form>
			<a href="../salir.php">Salir</a>
		</CENTER>
	</BODY>
</HTML>