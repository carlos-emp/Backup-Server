<?php
// Nuestro token
$deviceToken = '916f85a7fcb4a7085f4efbd980fe1f7c115a88f4419bf07dffee1f86e33947bb';

//$deviceToken = '19a99c7293df8d10fef15e45514db49031b74c0afdcf65141badfd34657c6150';
//$deviceToken = $_GET['token'];
// El password del fichero .pem
$passphrase = '19Alex90';
// El mensaje push
$message = $_GET['msj'];
$ctx = stream_context_create();
//Especificamos la ruta al certificado .pem que hemos creado
stream_context_set_option($ctx, 'ssl', 'local_cert', 'certs/TestPushCK.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
// Abrimos conexión con APNS
$fp = stream_socket_client(
	'ssl://gateway.sandbox.push.apple.com:2195', $err,
	$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
if (!$fp) {
	exit("Error de conexión: $err $errstr" . PHP_EOL);
}
echo 'Conectado al APNS' . PHP_EOL;
// Creamos el payload
$body['aps'] = array(
	'alert' => $message,
	'sound' => 'bingbong.aiff',
	'badge' => '35'
	);
// Lo codificamos a json
$payload = json_encode($body);
// Construimos el mensaje binario
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
// Lo enviamos
$result = fwrite($fp, $msg, strlen($msg));
if (!$result) {
	echo 'Mensaje no enviado' . PHP_EOL;
} else { 
	echo 'Mensaje enviado correctamente' . PHP_EOL;
}
// cerramos la conexión
fclose($fp);