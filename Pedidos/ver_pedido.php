<HTML>
	<HEAD>
		<TITLE>Ver pedido </TITLE>
		<?php require("../db/conexion_db.php");
			$cod=$_GET["aux"];
			$res= mysql_query("SELECT nit, nombre, direccion, telefono, fecha, estado FROM pedido WHERE cod_pedido='$cod'");
			$row=mysql_fetch_row($res);
			$nit = $row[0];
			$nombre = $row[1];
			$dir = $row[2];
			$telf = $row[3];
			$fecha = date_create($row[4])->format("d-m-Y H:i");
			$estado = $row[5];
			$total = 0;
			
			function obtener_productos(){
				$cod=$_GET["aux"];
				$total = 0;
				$res=mysql_query("SELECT P.cod_producto, P.nombre, P.tipo, P.precio, OP.cantidad FROM pedido_producto OP, producto P WHERE OP.cod_pedido='$cod' AND P.cod_producto=OP.cod_producto");
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
		<H1> pedido Numero: <?php echo $cod; ?></H1>
			<b><FONT SIZE=4> Nit: </FONT></b>&nbsp; <?php echo $nit; ?><br><br>
			<b><FONT SIZE=4> Nombre: </FONT></b>&nbsp; <?php echo $nombre; ?><br><br>
			<b><FONT SIZE=4> Direccion: </FONT></b>&nbsp; <?php echo $dir; ?><br><br>
			<b><FONT SIZE=4> Telefono: </FONT></b>&nbsp; <?php echo $telf; ?><br><br>
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
			<form action="cancelar_pedido.php" name="cancel" method="get">
				<input type="hidden" name="aux" value="<?php echo $cod; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
				<input type="submit" name="cancelar" value="<?php if ($estado==1) echo 'Cancelar'; else echo 'Reestablecer';?>">
			</form>
			<a href="index.php">Ver Lista</a><br>
			<a href="../salir.php">Salir</a>
		</CENTER>
	</BODY>
</HTML>