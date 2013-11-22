<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> MenuPrecios </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body background=r.jpg>
  		<?php
		function llenarMenu()
		{
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM producto ORDER BY tipo", $db);
			while($fila=mysql_fetch_assoc($res))
				{
					echo "<TR>";
					echo "<TD>".$fila['nombre']."</TD>";	
					//echo "<TD>".$fila['descripcion']."</TD>";	
					echo "<TD>".$fila['precio']."</TD>";	
					echo "</TR>";
				
				}
		}
		?>


		<h1   align=center> --MENU-- </h1>
			<TABLE BORDER=3 bgcolor=#cc9900 align=center>
				<TR>
					<TD>Plato</TD>
					<TD>Precio</TD>
				</TR>
				<?php
					llenarMenu();
				?>
			</TABLE>
			<BR><BR>
			</FORM>
		</CENTER>

 </body>
</html>
