<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$usuario = $_POST["nombre"];
$pass=$_POST["pass"];

$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "bussu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die(json_encode(array("response" => "CONNECTION_ERROR", "detail" => $conn -> connect_error)));
}

$sql = "SELECT * from  clientes WHERE clientes.correo='$usuario' && clientes.pass='$pass' && clientes.activo='si';";


	/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
	$nivel="";
   while($row = mysqli_fetch_array ($resultado))
{

        $nivel = $row['nivel'];
}
	$row_cnt = $resultado->num_rows;
echo json_encode(array("response"=>"OK","detail"=>$row_cnt,"nivel"=>$nivel));
    /* liberar el conjunto de resultados */
    $resultado->close();
}
else {
    echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}


?>
