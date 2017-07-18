<?php
require 'config.php';

$mail = new PHPMailer;

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host		=getenv('MAIL_HOST');
$mail->Port		=getenv('MAIL_PORT');
$mail->Username		=getenv('MAIL_USERNAME');
$mail->Password		=getenv('MAIL_PASSWORD');
if (getenv('MAIL_DEBUG')===true)
	$mail->SMTPDebug=2;

$parameters=getopt('',array(
	'to::',
	'name::',
	'subject::',
	'body::',
	'attach::'
));
if (!array_key_exists('to',$parameters)
or !array_key_exists('subject',$parameters)
or !array_key_exists('body',$parameters))
	die('Los parametros to, subject y body son obligatorios');
$mail->addAddress($parameters['to'], $parameters['name']);
$mail->Subject  = utf8_decode($parameters['subject']);
$mail->Body = utf8_decode($parameters['body']);

if ($parameters['attach']){
	if (!is_array($parameters['attach'])){
		if (file_exists($parameters['attach']))
			$mail->AddAttachment($parameters['attach']);
		else
			die("El adjunto: ".$parameters['attach']." no existe");
	}else{
		foreach($parameters['attach'] as $key){
			if (file_exists($key))
				$mail->AddAttachment($key);
			else
				die("El adjunto: $key no existe");
		}
	}
}
$mail->send();
