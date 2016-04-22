<?php
$con=mysql_connect("localhost","admin_default","ashc021401") or die("No Conectado a la base de datos");
$bdd=mysql_select_db("admin_default");

$nom=$_POST["nombre"];
$cor=$_POST["correo"];
$men=$_POST["message"];


mysql_query("insert into contacts(id,name,email,message) 
values(null,'".$_POST["nombre"]."','".$_POST["correo"]."','".$_POST["message"]."')",$con);

//ahora envío el mail de notificación a mi cuenta

$co="albertojmv@gmail.com";
$remitente=$_POST["correo"];
$asunto="Contact Us From kpresta.com";
$cuerpo=
"
<html>
<head>
<body>
<table align='center' width='400'>
<tr>
<td valign='top' align='right' width='200'>
Nombre:
</td>
<td valign='top' align='left' width='200'>
".$_POST["nombre"]."
</td>
</tr>
<tr>
<td valign='top' align='right' width='200'>
E-Mail:
</td>
<td valign='top' align='left' width='200'>
".$_POST["correo"]."
</td>
</tr>
<tr>
<td valign='top' align='right' width='200'>
Mensaje:
</td>
<td valign='top' align='left' width='200'>
".$_POST["message"]."
</td>
</tr>

</table>
</body>
</head>
</html>
";

$sheader="From:".$remitente."\nReply-To:".$remitente."\n"; 
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n"; 
$sheader=$sheader."Mime-Version: 1.0\n"; 
$sheader=$sheader."Content-Type: text/html"; 

mail($co,$asunto,$cuerpo,$sheader);

echo "<script type='text/javascript'>
	alert('Gracias por contactar con nosotros.. Pronto nos pondremos en contacto con usted');
	window.location='../';
</script>";


?>