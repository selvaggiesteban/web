<?php

	$mailFrom = $_POST["email"];
	$name = $_POST["name"];
	$tel = $_POST["tel"];
	$subject = "Solicitud web";
	$to = "info@mako.com.ar";
	$headers = "From: " . $to;
	$message = "E-mail de contacto: " . $mailFrom . "\n\n" . "Nombre y apellido: " . $name . "\n\n" . "Teléfono de contacto: " . $tel . "\n\n" . "Solicitud web. Responder a la brevedad";
	
	$data = array(
		'secret' => "6LcMkLoaAAAAAAFXTLzc4jxNN03Opbb5UQxx3pqV",
		'response' => @$_POST['g-recaptcha-response']
	);

	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);
	$response = json_decode($response, true);

	if ($response['success'] === true)	{
		mail($to, $subject, $message, $headers);
		header("Location: send.html");
	}
	else {
		header("Refresh:0; url=index.html");
		$alert = "Por favor completa el Captcha para enviar tu mensaje!";
		echo "<script type='text/javascript'>alert('$alert');</script>";
	}
	
?>