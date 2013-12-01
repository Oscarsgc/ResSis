<HTML>
	<HEAD>
	<?php require("../conexion_db.php"); ?>
		<TITLE>Crear Menu Del Dia</TITLE>
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
        	var parentDiv = document.getElementById ("main")
			var element = document.createElement ("select");
            element.setAttribute("name", "Producto"+c);
            c=c+1;
            for (var i=0;i < arreglo.length;i++)
            {
                var option = new Option (arreglo[i][0], arreglo[i][1]);
                element.options[element.options.length] = option;
            }
            parentDiv.appendChild (element);
            element = document.createElement('br');
			parentDiv.appendChild(element);
			element = document.createElement('br');
			parentDiv.appendChild(element);
        }

    </script>

	</HEAD>
	<BODY>
		<CENTER>
		<H1>Cree su menu</H1>
			<FORM id="main">
			Dia: <SELECT NAME="dia" value="Dia" SIZE=1>
					<OPTION VALUE="lunes">Lunes</OPTION>
					<OPTION VALUE="martes">Martes</OPTION>
					<OPTION VALUE="miercoles">Miercoles</OPTION>
					<OPTION VALUE="jueves">Jueves</OPTION>
					<OPTION VALUE="viernes">Viernes</OPTION>
					<OPTION VALUE="sabado">Sabado</OPTION>
					<OPTION VALUE="domingo">Domingo</OPTION>
				</SELECT><br><br> Seleccione los productos: &nbsp;
				<span id="insertHere"></span>
				 <input type="button" onclick="addSelectBox();" name="producto" value="Agrega Producto" />
				<br>
				<br>
			</FORM>
			<FORM>
				<Input type=submit value="Crear" name="Crear">	
			</FORM>
		</CENTER>
	</BODY>
</HTML>