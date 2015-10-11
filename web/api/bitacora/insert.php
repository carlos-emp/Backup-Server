<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");


$titulo=$_POST["titulo"];
$descripcion=$_POST["descripcion"];
$status=$_POST["estatus"];
$entregable=$_POST["entregable"];
$obstaculos=$_POST["obstaculos"];
$time=$_POST["time"];
$date=$_POST["date"];
$from=$_POST["from"];
$to=$_POST["to"];
$topic=$_POST["topic"];
$lab=$_POST["lab"];
$prior=$_POST["prioridad"];
$categoria=$_POST["categoria"];

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

$sql = "INSERT INTO actividad VALUES (NULL,
'$titulo',
 '$descripcion',
  '$status',
   '$time',
   '$entregable',
   '$from',
   '$to',
   '$obstaculos',
   '$date',
   '$topic',
   '$lab',
 '$prior',
 '$categoria');";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=>"OK","detail"=>$time));
    //$sent="ok";
} else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
    //$sent="no";
}

$conn->close();
?>
