<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />			<TITLE>Ver Orden </TITLE>
	<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
		<?php require("../db/conexion_db.php");
			$cod=$_GET["aux"];
			$res= mysql_query("SELECT num_mesa, nombre_cliente, fecha, estado FROM orden WHERE cod_orden='$cod'");
			$row=mysql_fetch_row($res);
			$mesa = $row[0];
			$nombre = $row[1];
			$fecha = date_create($row[2])->format("d-m-Y H:i");
			$estado = $row[3];
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
	<div id="templatemo_container">
	
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php">Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="index.php" class="current">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
				    <li><a href="../Usuarios/perfil.php">Perfil</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Orden<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
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
			<form action="cancelar_orden.php" name="cancel" method="get">
				<input type="hidden" name="aux" value="<?php echo $cod; ?>">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
				<input type="submit" name="cancelar" value="<?php if ($estado==1) echo 'Cancelar'; else echo 'Restablecer';?>">
			</form>
			<a href="index.php">Ver Lista</a><br>
			<a href="../salir.php">Salir</a>
		</CENTER>
		</div>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>