<?php 
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo']:"";
if($correo){
	$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre']:"";
	$ciudad = isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad']:"";
	$telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono']:"";
	$mensaje = isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje']:"";
	$cabeceras = 'From: '.$correo."\r\n".'Reply-To: info@buscameapp.com, info@scriptmedia.co' . "\r\n" .'X-Mailer: PHP/' . phpversion();
	$cabeceras .= "MIME-Version: 1.0\r\n";
	$cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

	$mensajeC = '
			<html>
			<head>
			  <title>Correo contacto b&uacute;scameapp.com</title>
			</head>
			<body>
			  <p>¡RESPONDER R&Aacute;PIDO!</p>
			  <table>
				<tr>
				  <td>Nombre almacen: '.$nombre.'</td>
				</tr>
				<tr>
				 <td>Ciudad del almacen: '.$ciudad.'</td>
				</tr>
				<tr>
				  <td>Tel&eacute;fono: '.$telefono.'</td>
				</tr>
				<tr>
				  <td>Correo: '.$correo.'</td>
				</tr>
				<tr>
				  <td>Mensaje: '.$mensaje.'</td>
				</tr>
			  </table>
			</body>
			</html>
			';

	mail('miguel@scriptmedia.co ', 'Correo contacto buscameapp.com - '.$nombre, $mensajeC,$cabeceras);
	echo "Enviado";
}else{
	header('Location: http://buscameapp.com/');
}
?>