<<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$campo=utf8_decode($_POST['campo']);
$valor=utf8_decode($_POST['valor']);
$target=utf8_decode($_POST['target']);

$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "bussu";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die(json_encode(array("response"=>"CONNECTION_ERROR","detail"=>$conn->connect_error)));
}

$sql="update clientes set clientes.$campo='$valor' where clientes.correo = '$target'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=>"OK","detail"=>$time));
} else {
    $estado="YA_EXISTIA";
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}

$conn->close();

 ?>
