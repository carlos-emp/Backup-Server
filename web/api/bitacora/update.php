<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$campo=$_POST["campo"];
$valor=$_POST["valor"];
$campoObjetivo=$_POST['campoObjetivo'];
$valorObjetivo=$_POST['valorObjetivo'];

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
$sql="update actividad set $campo='$valor' where $campoObjetivo='$valorObjetivo'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=>"OK","detail"=>$valor));
    //$sent="ok";
} else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
    //$sent="no";
}

$conn->close();
?>
