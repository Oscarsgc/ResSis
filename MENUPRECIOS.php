<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> MenuPrecios </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body bgcolor=#0000ff>
  		<?php
		function llenarMenu()
		{
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM productos SORT BY Tipo", $db);
			while($row=mysql_fetch_row($res))
				{
					echo "<TR>";
					echo "<TD>".$row[0]."</TD>";	
					echo "<TD>".$row[1]."</TD>";	
					echo "<TD>".$row[3]."</TD>";	
					echo "</TR>";
				
				}
		}
		?>


		<h1 color+#660033 align=center> MENU </h1>
			<TABLE BORDER=3 align=center bgcolor=#ffffff>
				<TR>
					<TD>Codigo</TD>
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
