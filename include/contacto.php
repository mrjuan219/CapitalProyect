<?php
$tel = $_POST['tel'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];


$mail = "
<html>
	<body>
	<meta charset='utf-8'>
		Nombre: ".$nombre." <br>
		Telefono: ".$tel." <br>
		Email: ".$email." <br>
		Mensaje: ".$mensaje." <br>
   </body> 
</html>				 
";

//Titulo
$titulo = "Contacto Pagina Web FLEX Ambiental";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
//dirección del remitente 
$headers .= "From: ".$email."\r\n";
//Enviamos el mensaje a tu_dirección_email
mail("ventas@flexambiental.com" ,$titulo,$mail,$headers);
if($bool){
	echo"1";
}else{	
	echo"2";
}
?>