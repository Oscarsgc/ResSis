<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<TITLE>Registrar Pensionado</TITLE>
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
	<div id="templatemo_container">
			<div class="templatemo_topmenu">
				<ul>
      				<li><a href="../index.html" >Inicio</a></li>
      				<li><a href="../Pedidos/index.php" >Pedidos</a></li>
      				<li><a href="../Menus/listaMenuDiario.php" >Menus</a></li>
				    <li><a href="../Ordenes/index.php">Ordenes</a></li>
				    <li><a href="listaPensionados.php" class="current">Pensionados</a></li>
				    <li><a href="../Productos/listaProductos.php">Productos</a></li>
				    <li><a href="../principalMarketing.php">Promociones</a></li>
				    <li><a href="../ReservaMesas/index.php">Reservas</a></li>
				    <li><a href="../Usuarios/login.php">Iniciar Sesion</a></li>
      			</ul>
			 </div>
			<div id="templatemo_topsection">Agregue Pensionado<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">

		<CENTER>
		<FORM Method="POST" Action="controlAgregarPensionado.php" NAME="registro">
		Ci: <INPUT TYPE="Text" NAME="ci" onkeydown="return soloEnteros(this, event);"><BR><BR>
		Nombre: <INPUT TYPE="Text" NAME="nombre"><BR><BR>
		Direccion: <INPUT TYPE="Text" NAME="direccion"><BR><BR>
		Telefono: <INPUT TYPE="Text" NAME="telefono" onkeydown="return soloEnteros(this, event);"><BR><BR>
		<INPUT TYPE=Hidden NAME="estado" value='1'><BR><BR>
		<INPUT TYPE=Submit NAME="ingresar" VALUE="Ingresar">
				<INPUT TYPE=Reset NAME="borrar" VALUE="Borrar">
				<A HREF="listaPensionados.php">Volver</A>
				<BR>
		</FORM>
		</CENTER>
		</div>
			<BR><BR>
		<div id="templatemo_footer">Copyright © ResSis</div>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='../CSS/js/logging.js'></script>
	</BODY>
</HTML>