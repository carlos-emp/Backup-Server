<?php
//header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");


//$from=$_GET["from"];
//$to=$_GET["to"];
//$who=$_GET["who"];
//$message=$_GET["message"];
//$time=$_GET["time"];
//$date=$_GET["date"];
$from=$msg["from"];
$to=$msg["to"];
$who=$msg["chatTarget"];
$message=$msg["message"];
$time=$msg["time"];
$date=$msg["date"];

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

$sql = "INSERT INTO mensaje VALUES (NULL,'$from', '$to', '$message', '$time','$date','$who');";

if ($conn->query($sql) === TRUE) {
    //echo json_encode(array("response"=>"OK","detail"=>$time));
    $sent=array('de' => $from,'para'=>$to );;
} else {
    //echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
    $sent="no";
}

$conn->close();
?>
