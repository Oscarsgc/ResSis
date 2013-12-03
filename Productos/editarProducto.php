<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<TITLE>Editar Producto</TITLE>
	<link href="../CSS/templatemo_style.css" rel="stylesheet" type="text/css" />


		<script type="text/javascript" src="../CSS/reflection.js"></script>
		<script type="text/javascript">
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
	<?php 
		$id=$_GET["aux"];
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db("restaurant",$db);
		$res=mysql_query("SELECT * FROM producto Where cod_producto='$id'", $db);
		$data = mysql_fetch_row($res);
		?>	
		<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php" >Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="../Pensionados/listaPensionados.php">Pensionados</a></li>
				    <li><a href="listaProductos.php" class="current">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Editar Producto<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">

		<CENTER>
		<form action="guardarProductoEditado.php" method="POST">
  			Codigo: <input type="hidden" name="codigo" value="<?php echo $data[0]?>"/> </br>
  			Nombre: <input type="text" name="nombre" value="<?php echo $data[1]?>"/> </br>
  			Tipo: <SELECT NAME="tipo" value="<?php echo $data[tipo]?>" SIZE=1>
				<OPTION VALUE="1">Plato</OPTION>
				<OPTION VALUE="2">Bebida</OPTION>
				<OPTION VALUE="3">Guarnicion</OPTION>
			</SELECT>	  		<BR><BR>	
  			Precio: <input type="text" name="precio" value="<?php echo $data[3]?>" onkeydown="return soloEnteros(this, event);"/></br>
  			Estado: <input type="text" name="estado" value="<?php echo $data[2]?>" onkeydown="return soloEnteros(this, event);"/></br>
  			<input type="Submit" name="Guardar" value="Guardar">
		</form>
		<form action="listaProductos.php">
			<input type = "submit" name="Cancelar" value = "Cancelar">
		</form>
		</CENTER>
		</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
</BODY>
</HTML>