<?php
	error_reporting( E_ALL & ~( E_NOTICE | E_STRICT | E_DEPRECATED ) ); //Aquí se genera un control de errores "NO BORRAR NI SUSTITUIR"
	require_once "Mail.php"; //Aquí se llama a la función mail "NO BORRAR NI SUSTITUIR"

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$to = 'pauvilac@gmail.com'; //Aquí definimos quien recibirá el formulario
	$from = 'contact@pauvilaux.com'; //Aquí definimos que cuenta mandará el correo, generalmente perteneciente al mismo dominio
	$host = '217.116.0.228'; //Aquí definimos cual es el servidor de correo saliente desde el que se enviaran los correos
	$username = 'contact@pauvilaux.com'; //Aqui se define el usuario de la cuenta de correo
	$password = 'Emdicpau0'; //Aquí se define la contraseña de la cuenta de correo que enviará el mensaje
	$subject = '[PORTFOLIO PAUVI] Missatge de '.$name; //Aquí se define el asunto del correo
	$body = 
'----------------'.'
'.'Missatge de '.$name.'
'.'Email: '.$email.'
'.'Missatge: '.$message.'
'.'----------------'; //Aquí se define el cuerpo de correo

	//A partir de aquí empleamos la función mail para enviar el formulario

	$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject);
		$smtp = Mail::factory('smtp',
			array ( 'host' => $host,
				'auth' => true,
				'username' => $username,
				'password' => $password)
	    );

	$mail = $smtp->send($to, $headers, $body);

	//Una vez aquí habremos enviado el mensaje mediante el formulario

	//El siguiente codigo muestra en pantalla un mensaje indicando que el mensaje ha sido enviado y a que cuenta ES OPCIONAL desde Acens lo incluimos para verificar que el formulario de prueba esta funcionando

	if (PEAR::isError($mail)) {
		echo("

		" . $mail->getMessage() . "

		");
		echo 0;
	} 
	else {
		echo 1;
	}
?>