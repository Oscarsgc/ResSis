<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> menuCombos </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

<script>
   function myCombos() 
 {	
	var myCombos=["Combos/c2.png","Combos/c1.png","Combos/c3.jpg","Combos/c4.jpg"] 
	//var Combos=["Descripcion combo 2","Descripcion combo 1","Descripcion combo 3","Descripcion combo 4"]
	var ind=Math.floor(Math.random() * myCombos.length); 
	document.iCombos.src=myCombos[ind];
	 //confirm(Combos[ind])
 }
 function adminCombos()
 {
	if (confirm("Opciones de administrador")){}
 }
</script>
 </head>

 <!--Las promociones seran imagenes que se actualizaran en la base de datos,por ahora pondre una imagen local-->
<script>
</script>
 <body bgcolor=#ffff00>
<h1 align=center >Combos del Mes</h1>
<img name="Combos" SRC="Combos/c1.png" onmouseout=myCombos()  ondblclick=adminCombos() Height="280" Width="500" id="iCombos"> 
</form>
 </body>
</html>

