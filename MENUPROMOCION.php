<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> menuPromocion </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

<script>
   function myPromos() 
 {	
	var myArray=["Promociones/p1.jpg","Promociones/p2.jpg","Promociones/p3.png"] 
	var rand = myArray[Math.floor(Math.random() * myArray.length)]; 
	document.P.iPromos.src=rand; 

 } 
function getDescripcion()
 {
 confirm("Descripcion de la promocion")
 }
 
 function adminPromos()
 {
	if (confirm("Menu Administrador")){}
 }
</script>
 </head>

 <!--Las promociones seran imagenes que se actualizaran en la base de datos,por ahora pondre una imagen local-->
<script>
</script>
 <body bgcolor=#ff0000>
<h1 align=center >Promociones del Mes</h1>
<form name=P id=P>
<IMG name="Promos" SRC="Promociones/p3.png" onmouseout=myPromos()  ondblclick=adminPromos() Height="280" Width="500" id="iPromos"> 
</form>
 </body>
</html>
