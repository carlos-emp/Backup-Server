<?php
$servername = "localhost";
$user = "root";
$password = "19Alex90";
$dbname = "bissu";

$username=$_POST["username"];
$pass=$_POST["pass"];
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$estado=$_POST["estado"];
$rfc=$_POST["rfc"];
$empresa=$_POST["empresa"];

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO usuario (username,
 pass,
 id,
 nombre,
 direccion,
 email,
 telefono,
 celular,
 estado,
 rfc,
 empresa )
VALUES ($username,
 $pass,
 null,
 $nombre,
 $direccion,
 $email,
 $telefono,
 $celular,
 $estado,
 $rfc,
 $empresa )";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("response"=> "New record created successfully"));
} else {
    echo json_encode(array("respuesta"=> "Error: " . $sql . "<br>" . $conn->error));;
}

$conn->close();
?>