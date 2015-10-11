<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$me = $_GET["me"];


$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "chat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die(json_encode(array("response" => "CONNECTION_ERROR", "detail" => $conn -> connect_error)));
}

$sql = "SELECT mensaje.chat, mensaje.message, mensaje.date, mensaje.time, max(mensaje.id) from mensaje WHERE mensaje.from='$me' OR mensaje.to='$me' GROUP BY mensaje.chat order by max(mensaje.id) desc;";


	/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
	$json = array();
   while($row = mysqli_fetch_array ($resultado))
{
	if($row["chat"]!==""){
		$parts= explode("-",$row["chat"]);
		$para=$parts[0];
		if($parts[0]===$me){
			$para=$parts[1];
		}
    $bus = array(
        'chat' => $row['chat'],
				'quien' => $me,
				'nombre' => $para,
        'date' => str_replace('-','/',$row['date']),
        'time' => str_replace('-',':',$row['time']),
				'last_mensaje' => $row['message'],
				'image' => "https://spinlister-belvedere-assets.spinlister.com/spinlister/user-default-photo.png"
		);
    array_push($json, $bus);
	}
}

echo json_encode(array("response"=>"OK",'cuenta' => $resultado->num_rows,"detail"=>$json));
    /* liberar el conjunto de resultados */
    $resultado->close();

}
else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}


?>
