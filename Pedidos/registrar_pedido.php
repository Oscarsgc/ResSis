<?php include ("../seguridad.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<?php require("../db/conexion_db.php"); ?>
		<TITLE>Registrar Pedido</TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
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


        function soloEnteros(objeto, e){

             var keynum
             var keychar
             var numcheck
             if(window.event){ 
                keynum = e.keyCode
				}
           else if(e.which){ 
            keynum = e.which
          }
             if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) {
            return true;

            }
  			if((keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){
           	 return true;
          	}else {
            	return false;
           }
    	}
    </script>

	</HEAD>
	<BODY>
	<div id="templatemo_container">
	
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="index.php" class="current">Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
				    <li><a href="../Usuarios/perfil.php">Perfil</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Registrar Pedido<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
		<form id="registro" name="registro" action="guardar_pedido.php" method="post">
			Nit: <input type="text" name="nit" onkeydown="return soloEnteros(this, event);"/><br>
			Nombre: <input type="text" name="nombre"/><br>
			Direccion: <input type="text" name="dir" /><br>
			Telefono: <input type="text" name="telf" onkeydown="return soloEnteros(this, event);"/><br>
			<br>
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
		</div>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>