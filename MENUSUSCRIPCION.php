<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> MenuSuscripcion </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 <script>
 function Suscripcion()
 {
 document.write("<h1>Su correo fue registrado<br>Esta opcion no puede ser deshabilitada<br> ;)</h1>")
 }
 </script>
 </head>

 <body bgcolor=#cc9900>
<h2 color=#339933 align=LEFT>SUSCRIBETE</h2>
<form action=Suscripcion() method="POST">
<table align="LEFT" width="225" cellspacing="2" cellpadding="2" border="0">
<tr>
    <td colspan="2" align="LEFT" bgcolor=red><span style="color:ffffff"><b>Recibe Descuentos y Ofertas</b></span>
</tr>
<tr>
    <td align="LEFT">Email:</td>
    <td><input type="Text" name="email" size="8" maxlength="50"></td>
</tr>
<tr>
    <td align="LEFT">Zona:</td>
    <td><input type="Text" name="zona" size="8" maxlength="50"></td>
</tr>
<tr>
    <td colspan="2" align="LEFT"><input type="Submit" onclick="Suscripcion();" value="ENVIAR MI INFO"></td>
</tr>
</table>
</form>

 </body>
</html>
