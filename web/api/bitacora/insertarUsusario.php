<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

if(isset($_GET["wikiname"]) && isset($_GET["contra"])){
$wikiname=$_GET["wikiname"];
$contra=$_GET["contra"];

$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "bitacora";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die(json_encode(array("response"=>"CONNECTION_ERROR","detail"=>$conn->connect_error)));
}
$salt = '*3Mp0W3rL48$*';
$contra=md5($salt.$contra);
$contra=sha1($contra);
$sql = "INSERT INTO colaborador VALUES ('$wikiname','$contra');";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=>"OK","detail"=>$time));
    //$sent="ok";
} else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
    //$sent="no";
}

$conn->close();
}
else {
  echo json_encode(array("response"=>"ERROR","detail"=>"Hay campos vacios"));
}
 ?>
