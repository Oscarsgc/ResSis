<HTML>
	<HEAD>
	<?php require("../db/conexion_db.php"); ?>
		<TITLE>Registrar Orden</TITLE>
	<?php
		$resultSet=array();
		
		function obtener_productos_por_tipo($tipo) {
			$resultSet=array();
			$res=mysql_query("SELECT cod_producto, nombre, precio FROM producto where estado='1' and tipo='$tipo'");
			while($row = mysql_fetch_row($res)){
	   			$resultSet[] = $row;
			}
			return $resultSet;
		}
	?>

	<script type="text/javascript">
    	var c1=0;
    	var c2=0;
    	var c3=0;
    	var arreglo1 = <?php echo json_encode(obtener_productos_por_tipo('1'));?>;
    	var arreglo2 = <?php echo json_encode(obtener_productos_por_tipo('2'));?>;
    	var arreglo3 = <?php echo json_encode(obtener_productos_por_tipo('3'));?>;
		function addSelectBox (tipo)
        {
        	if (tipo=='1'){
        		var arreglo = arreglo1;
	        	var parentDiv = document.getElementById ("main1");
				var element = document.createElement ("select");
	            element.setAttribute("name", "plato"+c1);
	            var element2 = document.createElement ("input");
	            element2.setAttribute("name", "cant_plato"+c1);
	            c1=c1+1;
	        } else {
	        	if (tipo == '2'){
	        		var arreglo = arreglo2;
		        	var parentDiv = document.getElementById ("main2");
					var element = document.createElement ("select");
		            element.setAttribute("name", "bebida"+c2);
		            var element2 = document.createElement ("input");
	          		element2.setAttribute("name", "cant_bebida"+c2);
		            c2=c2+1;
		        } else {
		        	if (tipo=='3'){
		        		var arreglo = arreglo3;
			        	var parentDiv = document.getElementById ("main3");
						var element = document.createElement ("select");
			            element.setAttribute("name", "guarnicion"+c3);
			            var element2 = document.createElement ("input");
	            		element2.setAttribute("name", "cant_guarnicion"+c3);
			            c3=c3+1;
			        }
			    }
			}
			element2.setAttribute("maxlength", "2");
            for (var i=0;i < arreglo.length;i++)
            {
                var option = new Option (arreglo[i][1], arreglo[i][0]);
                element.options[element.options.length] = option;
            }
            parentDiv.appendChild(element);
            parentDiv.appendChild(element2);
            element = document.createElement('br');
			parentDiv.appendChild(element);
			element = document.createElement('br');
			parentDiv.appendChild(element);
        }

        function contador(){
        	var parentDiv = document.getElementById ("registro");
        	var element = document.createElement("input");
        	element.setAttribute("type", "hidden");
        	element.setAttribute("name","cantSel1");
        	element.setAttribute("value", c1);
        	parentDiv.appendChild(element);
        	parentDiv = document.getElementById ("registro");
        	element = document.createElement("input");
        	element.setAttribute("type", "hidden");
        	element.setAttribute("name","cantSel2");
        	element.setAttribute("value", c2);
        	parentDiv.appendChild(element);
        	parentDiv = document.getElementById ("registro");
        	element = document.createElement("input");
        	element.setAttribute("type", "hidden");
        	element.setAttribute("name","cantSel3");
        	element.setAttribute("value", c3);
        	parentDiv.appendChild(element);
        }

    </script>

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