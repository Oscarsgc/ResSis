<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<TITLE>
			Menus diarios
		</TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>

	</HEAD>
	<BODY>
	<?php require("../conexion_db.php"); ?>
		<?php
		function llenarTablaActivos($dia){
			$res=mysql_query("SELECT P.cod_producto, P.nombre, P.precio FROM menu_dia MD, producto P, producto_menu_dia PM WHERE ((MD.cod_menu_dia= PM.cod_menu_dia) AND (P.cod_producto=PM.cod_producto) AND (MD.dia='$dia') AND (MD.estado='1'))");
			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";
				echo "<TD>".$row[2]."</TD>";
				echo "</TR>";
				
			}
		}
		?>

		<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php">Pedidos</a></li>
      				<li><a href="crearMenu.php" class="current">Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
				</ul>
			 </div>
			<div id="templatemo_topsection">Lista Menus Activos <br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
		<style type="text/css">
			.tg-table-orange { border-collapse: collapse; border-spacing: 0; }
			.tg-table-orange td, .tg-table-orange th { background-color: #fff; border: 1px #aaa solid; color: #333; font-family: sans-serif; font-size: 100%; padding: 10px; vertical-align: top; }
			.tg-table-orange .tg-even td  { background-color: #FCFBE3; }
			.tg-table-orange th  { background-color: #F38630; color: #fff; font-size: 110%; font-weight: bold; }
			.tg-table-orange tr:hover td, .tg-table-orange tr.even:hover td  { color: #222; background-color: #FFC950; }
			.tg-bf { font-weight: bold; } .tg-it { font-style: italic; }
			.tg-left { text-align: left; } .tg-right { text-align: right; } .tg-center { text-align: center; }
		</style>
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">LUNES</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('lunes');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">MARTES</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('martes');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">MIERCOLES</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('miercoles');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">JUEVES</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('jueves');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">VIERNES</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('viernes');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">SABADO</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('sabado');?>
			</TABLE>
			<BR><BR>
			
			<TABLE BORDER=3 class="tg-table-orange">
  			<tr>
    			<th colspan="3">DOMINGO</th>
  			</tr>
  			 <tr class="tg-even">
    			<td>Codigo Plato</td>
    			<td>Nombre Plato</td>
    			<td>Precio Plato</td>
  			</tr>
			<?php llenarTablaActivos('domingo');?>
			</TABLE>
			</CENTER>
			</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>