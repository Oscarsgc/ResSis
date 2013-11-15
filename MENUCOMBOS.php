<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> MenuPrecios </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">


 </head>
<body>
<!--Este tengo q arreglarlo>
<?php function rotar()
		{
				$res=mysql_query("SELECT * FROM combos", $db);
		if($row=mysql_fetch_row($res))
			{	//Suponiendo q solo existiran 4 imagenes de combos...
			echo("document.src=".$row)	
				}

		}

</script>
<?php 	

//<!--Los combos seran imagenes que se actualizaran en la base de datos, que iran cambiando por click del usuario, por ahora pondre imagenes locales
echo(" <body src=$row[0] onclick='rotar();'>");
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db("restaurant",$db);
?>
-->
<h1 align=center>Combos</h1>
		
 </body>
</html>
