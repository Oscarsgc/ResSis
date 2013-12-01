<HTML>
	<HEAD>
		<TITLE>Crear Menu Del Dia</TITLE>
		<script type="text/javascript">

    	var c=0;
     
		function addSelectBox (arreglo)
        {
       		
            var parentDiv = document.getElementById ("main");
            var selectElement = document.createElement ("select");
            selectElement.setAttribute("name", "Producto"+c);
            c=c+1;
            for (var i=0;i < arreglo.length;i++)
            {
                var option = new Option (arreglo[i], arreglo[i]);
                selectElement.options[selectElement.options.length] = option;
            }
            parentDiv.appendChild(selectElement);

        }
    </script>

		<?php
		$resultSet=array();
		function leerDeBaseProductos(){
			$db = mysql_connect("localhost", "root", "root");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT nombre, cod_producto FROM producto where estado='1' and tipo='1'", $db);
			
			while($row = mysql_fetch_assoc($res))
			{
    			$resultSet[] = $row;
			}
			return $resultSet;
		}
		?>
	</HEAD>
	<BODY>
	<?php leerDeBaseProductos();?>
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
				</SELECT><br>	
				 <input type="button" onclick="addSelectBox(<?php echo json_encode($resultSet); ?>)" name="producto" value="Agrega Producto" />
				<br>
				
			</FORM>
			<FORM>
				<Input type=submit value="Crear" name="Crear">	
			</FORM>
		</CENTER>
	</BODY>
</HTML>