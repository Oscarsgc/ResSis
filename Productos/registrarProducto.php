<?php include ("../seguridad.php");?>
<?php 
if ($_SESSION["rol"] == '3') {
	header("Location: ../Usuarios/login.php");
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<TITLE>Registrar Producto</TITLE>
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
    	function dosDecimales(){    
   var objeto = objeto2;
     var posicion = objeto.value.indexOf('.');
     var decimal = 2;
        if(objeto.value.length - posicion < decimal){
            objeto.value = objeto.value.substr(0,objeto.value.length-1);                                        
          }else {
           objeto.value = objeto.value.substr(0,posicion+decimal+1);                                            

        }
      return;
     }

</script>
	</HEAD>
	</HEAD>
	<BODY>
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
			<div id="templatemo_topsection">Agregue Producto<br></div>
			<BR>
		
	
		<div id="templatemo_content_section">

		<CENTER>
		<FORM Method="POST" Action="controlAgregarProducto.php" NAME="registro">
		Codigo: <INPUT TYPE="Text" NAME="codigo"><BR><BR>
		Nombre: <INPUT TYPE="Text" NAME="nombre"><BR><BR>
		Tipo: <SELECT NAME="tipo" SIZE=1>
				<OPTION VALUE="1">Plato</OPTION>
				<OPTION VALUE="2">Bebida</OPTION>
				<OPTION VALUE="3">Guarnicion</OPTION>
			</SELECT>	<BR><BR>
		Precio: <INPUT TYPE="Text" NAME="precio" onkeydown="return soloEnteros(this, event);"><BR><BR>
		<INPUT TYPE=Hidden NAME="estado" value='1'><BR><BR>
		<INPUT TYPE=Submit NAME="ingresar" VALUE="Ingresar">
				<INPUT TYPE=Reset NAME="borrar" VALUE="Borrar">
				<A HREF="listaProductos.php">Volver</A>
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