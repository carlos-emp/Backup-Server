<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");


$from=$_GET["from"];
$to=$_GET["to"];
$message=$_GET["message"];
$time=$_GET["time"];
$date=$_GET["date"];
$who=$_GET["who"];


$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "chat";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die(json_encode(array("response"=>"CONNECTION_ERROR","detail"=>$conn->connect_error)));
} 

$estado='SIN_ESTADO';

$sql = "INSERT INTO chat_privado VALUES (NULL, '$who','$from', '$to');";

if ($conn->query($sql) === TRUE) {
    $estado="SE_CREA";
} else {
    $estado="YA_EXISTIA";
}

$sql = "INSERT INTO mensaje VALUES (NULL,'$from', '$to', '$message', '$time','$date','$who');";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=>"OK","detail"=>$time,"estado"=>$estado));
} else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error,"estado"=>$estado));
}


$conn->close();
?>