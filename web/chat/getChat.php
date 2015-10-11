<?php
//header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

//$me = $_GET["chat"];
//$me="JoseRojas-EricBaez";

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

//$sql = "SELECT * from mensaje WHERE mensaje.chat='$me';";
$sql="SELECT * from mensaje WHERE mensaje.chat='$me' ORDER BY mensaje.id DESC LIMIT 100";

	/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
	$json = array(); 
   while($row = mysqli_fetch_array ($resultado))
{
    $bus = array(
        'id' => $row['id'],
        'from' => $row['from'],
        'to' => $row['to'],
        'message' => $row['message'],
        'date' => str_replace('-','/',$row['date']),
        'time' => str_replace('-',':',$row['time']),
        'chat' => $row['chat']
    );
    array_push($json, $bus);
}

//echo json_encode(array("response"=>"OK","detail"=>$json));
$chat=array_reverse($json);
    /* liberar el conjunto de resultados */
    $resultado->close();
}
else {
    //echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}


?>
