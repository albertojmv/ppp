<?php

$con = mysql_connect("localhost", "root", "") or die("No Conectado a la base de datos");
       mysql_select_db("prestamos",$con);

$nom = filter_input(INPUT_POST, 'name');
$cor = filter_input(INPUT_POST, 'email');
$men = filter_input(INPUT_POST, 'message');

//$nom = $_POST['name'];
//$cor = $_POST['email'];
//$men = 'Hola';

//mysql_query("insert into contacts(id,name,email,message) 
//values(null,'" . $_POST["nombre"] . "','" . $_POST["correo"] . "','" . $_POST["message"] . "')", $con);

$query = "insert into contacts(name, email, message, created_at, updated_at) values('" . $nom . "', '" . $cor . "','" . $men . "',now(),now())";
mysql_query($query);
//ahora envío el mail de notificación a mi cuenta

$co = "albertojmv@gmail.com";
$remitente = $cor;
$asunto = "Contacto kpresta.com";
$cuerpo = "
<html>
<head>
<body>
<table align='center' width='400'>
<tr>
<td valign='top' align='right' width='200'>
Nombre:
</td>
<td valign='top' align='left' width='200'>
" . $nom . "
</td>
</tr>
<tr>
<td valign='top' align='right' width='200'>
E-Mail:
</td>
<td valign='top' align='left' width='200'>
" . $cor . "
</td>
</tr>
<tr>
<td valign='top' align='right' width='200'>
Mensaje:
</td>
<td valign='top' align='left' width='200'>
" . $men . "
</td>
</tr>

</table>
</body>
</head>
</html>
";

$sheader = "From:" . $remitente . "\nReply-To:" . $remitente . "\n";
$sheader = $sheader . "X-Mailer:PHP/" . phpversion() . "\n";
$sheader = $sheader . "Mime-Version: 1.0\n";
$sheader = $sheader . "Content-Type: text/html";

mail($co, $asunto, $cuerpo, $sheader);

echo "<script type='text/javascript'>
	alert('Gracias por contactar con nosotros.. Pronto nos pondremos en contacto con usted');
	window.location='../';
</script>";

?>