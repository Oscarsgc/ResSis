<?php include ("../seguridad.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<TITLE>Ver pedido </TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
		<?php require("../db/conexion_db.php");
			$cod=$_GET["aux"];
			$res= mysql_query("SELECT * FROM pedido WHERE cod_pedido='$cod'");
			$row=mysql_fetch_row($res);
			$nit = $row[1];
			$nombre = $row[2];
			$dir = $row[3];
			$telf = $row[4];
			$fecha = date_create($row[5])->format("d-m-Y H:i");
			$estado = $row[6];
			$entregado = $row[7];
			$usuario = $row[8];
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
			<div id="templatemo_topsection">Pedido<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
		<H1> Pedido Numero: <?php echo $cod; ?></H1>
			<b><FONT SIZE=4> Nit: </FONT></b>&nbsp; <?php echo $nit; ?><br><br>
			<b><FONT SIZE=4> Nombre: </FONT></b>&nbsp; <?php echo $nombre; ?><br><br>
			<b><FONT SIZE=4> Direccion: </FONT></b>&nbsp; <?php echo $dir; ?><br><br>
			<b><FONT SIZE=4> Telefono: </FONT></b>&nbsp; <?php echo $telf; ?><br><br>
			<b><FONT SIZE=4> Fecha: </FONT></b>&nbsp; <?php echo $fecha; ?><br><br>
			<b><FONT SIZE=4> Fecha: </FONT></b>&nbsp; <?php echo $usuario; ?><br><br>
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
				<input type="submit" name="cancelar" value="<?php if ($estado==1) echo 'Cancelar'; else echo 'Restablecer';?>">
			</form>
			<?php if ($_SESSION["rol"] != '3') {
					echo "<form action='entregar_pedido.php' name='entregar' method='get'>
							<input type='hidden' name='aux' value='$cod'>
							<input type='hidden' name='entregado' value='$entregado'>
							<input type='submit' name='entrega' value=";
					if ($entregado==0)
					 	echo "'Entregado'";
					else
					 	echo "'No entregado'";
					echo "></form>";
				}	
			?>

			<a href="index.php">Ver Lista</a><br>
			<a href="../salir.php">Salir</a>
		</CENTER>
		</div>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>