<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php require("../conexion_db.php"); ?>
		<TITLE>Crear Menu Del Dia</TITLE>
		<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="../CSS/reflection.js"></script>
	<?php
		$resultSet=array();
		$res=mysql_query("SELECT nombre, cod_producto FROM producto where estado='1' and tipo='1'");
		while($row = mysql_fetch_row($res))
		{
	   		$resultSet[] = $row;
		}
		function espacio() {

		}
	?>

	<script type="text/javascript">
    	var c=0;
		function addSelectBox ()
        {
        	var arreglo = <?php echo json_encode($resultSet); ?>;
        	var parentDiv = document.getElementById ("main");
			var element = document.createElement ("select");
            element.setAttribute("name", "Producto"+c);
            c=c+1;
            for (var i=0;i < arreglo.length;i++)
            {
                var option = new Option (arreglo[i][0], arreglo[i][1]);
                element.options[element.options.length] = option;
            }
            parentDiv.appendChild(element);
            element = document.createElement('br');
			parentDiv.appendChild(element);
			element = document.createElement('br');
			parentDiv.appendChild(element);
        }

        function contador(){
        	var parentDiv = document.getElementById ("main");
        	var element = document.createElement("input");
        	element.setAttribute("type", "hidden");
        	element.setAttribute("value", c);
        	element.setAttribute("name","cantSel");
        	parentDiv.appendChild(element);
        }

    </script>

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
			<div id="templatemo_topsection">Cree Su Menu<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">
		<CENTER>
		
			<FORM id="main" action="guardarMenu.php" method="POST">
			Dia: <SELECT NAME="dia" SIZE=1>
					<OPTION VALUE="lunes">Lunes</OPTION>
					<OPTION VALUE="martes">Martes</OPTION>
					<OPTION VALUE="miercoles">Miercoles</OPTION>
					<OPTION VALUE="jueves">Jueves</OPTION>
					<OPTION VALUE="viernes">Viernes</OPTION>
					<OPTION VALUE="sabado">Sabado</OPTION>
					<OPTION VALUE="domingo">Domingo</OPTION>
				</SELECT><br><br> Seleccione los productos: &nbsp;
				<span id="insertHere"></span>
				 <input type="button" onclick="addSelectBox();" name="producto" value="Agrega Producto" /><br>
				 <Input type="hidden" name="estado" value='1'>
				 	<Input type=submit value="Crear" onClick="contador();" name="Crear">	
				<br>
				<br>
			</FORM>
		</CENTER>
		</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>