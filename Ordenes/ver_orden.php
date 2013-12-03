<HTML>
	<HEAD>
		<TITLE>Ver Orden </TITLE>
		<?php require("../db/conexion_db.php");
			$cod=$_GET["aux"];
			$res= mysql_query("SELECT num_mesa, nombre_cliente, fecha FROM orden WHERE cod_orden='$cod'");
			$row=mysql_fetch_row($res);
			$mesa = $row[0];
			$nombre = $row[1];
			$fecha = date_create($row[2])->format("d-m-Y H:i");
			$total = 0;
			
			function obtener_productos(){
				$cod=$_GET["aux"];
				$total = 0;
				$res=mysql_query("SELECT P.cod_producto, P.nombre, P.tipo, P.precio, OP.cantidad FROM orden_producto OP, producto P WHERE OP.cod_orden='$cod' AND P.cod_producto=OP.cod_producto");
				while($row=mysql_fetch_row($res)){
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
					echo "<TD>".$row[4]."</TD>";
					echo "</TR>";
					$total = $total + ((float) $row[3] * (float) $row[4]);
				}
				return $total;
			}
		?>
	</HEAD>
	<BODY>
		<CENTER>
		<H1> Orden Numero: <?php echo $cod; ?></H1>
			<b><FONT SIZE=4> Numero de Mesa: </FONT></b>&nbsp; <?php echo $mesa; ?><br><br>
			<b><FONT SIZE=4> Nombre de Orden: </FONT></b>&nbsp; <?php echo $nombre; ?><br><br>
			<b><FONT SIZE=4> Fecha: </FONT></b>&nbsp; <?php echo $fecha; ?><br><br>
			<TABLE BORDER=3>
				<TR>
					<TH>Codigo Producto</TH>
					<TH>Producto</TH>
					<TH>Tipo</TH>
					<TH>Precio</TH>
					<TH>Cantidad</TH>
				</TR>
				<?php
					$total=obtener_productos();
				?>
			</TABLE>
			<BR>
			<b><FONT SIZE=4> Costo Total: </FONT></b>&nbsp; <?php echo $total; ?><br><br>
			<a href="index.php">Ver Lista</a><br>
			<a href="../salir.php">Salir</a>
		</CENTER>
	</BODY>
</HTML>