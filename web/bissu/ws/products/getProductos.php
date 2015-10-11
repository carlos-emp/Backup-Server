<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
//$me = $_GET["me"];


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

$sql = "SELECT * from producto_final;";

	/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
	$json = array();

   while($row = mysqli_fetch_array ($resultado))
{

    $bus = array('id' => utf8_encode($row['indice']),
        'ARTiCULO' => utf8_encode($row['ARTiCULO']),
        'PIEZAS_POR_CAJA' => utf8_encode($row['PIEZAS_POR_CAJA']),
        'PRECIO_POR_CAJA' => utf8_encode($row['PRECIO_POR_CAJA']),
				'MAYOREO_5000' => utf8_encode($row['MAYOREO_5000']),
				'PRECIO_SUGERIDO_BISSU' => utf8_encode($row['PRECIO_SUGERIDO_BISSU']),
				'LINEA' => utf8_encode($row['LINEA'])
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

?>
