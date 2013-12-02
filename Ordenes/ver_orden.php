<HTML>
	<HEAD>
		<TITLE>Lista de ordenes</TITLE>
		<?php require("../db/conexion_db.php");
			$res=mysql_query("SELECT P.cod_producto, P.nombre, P.precio FROM menu_dia MD, producto P, producto_menu_dia PM WHERE ((MD.cod_menu_dia= PM.cod_menu_dia) AND (P.cod_producto=PM.cod_producto) AND (MD.dia='$dia') AND (MD.estado='1'))");
			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[0]."</TD>";	
				echo "<TD>".$row[1]."</TD>";
				echo "<TD>".$row[2]."</TD>";
				echo "</TR>";
			}
		?>
	</HEAD>
	<BODY>
		<CENTER>
		<H1>Registrar Orden</H1>
		<form id="registro" name="registro" action="guardar_orden.php" method="post">
			Numero de Mesa: <input type="text" name="mesa" /><br>
			Nombre de Orden: <input type="text" name="nombre"/><br>
			Seleccione los productos y ponga la cantidad: <br>
			<div id="main1">
			<h3>Platos:</h3> 
				<input type="button" onclick="addSelectBox(1);" name="plato" value="Agrega Plato" /><br>
			</div>
			<div id="main2">
			<h3>Bebidas:</h3> 
				<input type="button" onclick="addSelectBox(2);" name="bebida" value="Agrega Bebida" />
			</div>
			<div id="main3">
			<h3>Guarniciones:</h3> 
				<input type="button" onclick="addSelectBox(3);" name="guarnicion" value="Agrega Guarnicion" /><br>
			</div>
			<br>
			<input type="submit" onclick="contador();" name="registrar" value="Guardar" />
		</form>
		</CENTER>
	</BODY>
</HTML>