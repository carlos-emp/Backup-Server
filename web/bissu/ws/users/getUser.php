<?php
$usuario = $_POST["correo"];

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

$sql = "SELECT * from  clientes WHERE clientes.correo='$usuario';";


/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
$json = array();
 while($row = mysqli_fetch_array ($resultado))
{
  $bus = array('nombre' => utf8_encode($row['nombre']),
      'telefono' => utf8_encode($row['telefono']),
      'entidad' => utf8_encode($row['entidad']),
      'correo' => utf8_encode($row['correo']),
      'descuento' => utf8_encode($row['descuento']),
      'pass' => utf8_encode($row['pass']),
      'activo' => utf8_encode($row['activo']),
      'no_cliente' => utf8_encode($row['no_cliente'])
  );
  array_push($json, $bus);
}

echo json_encode(array("response"=>"OK","detail"=>$json));
  /* liberar el conjunto de resultados */
  $resultado->close();

}
else {
  echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}
