<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$me = $_GET["user"];
//$me="JoseRojas-EricBaez";

$servername = "localhost";
$username = "root";
$password = "19Alex90";
$dbname = "bitacora";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die(json_encode(array("response" => "CONNECTION_ERROR", "detail" => $conn -> connect_error)));
}
if($me!==NULL){
$sql = "SELECT * from actividad WHERE actividad.from='$me' or actividad.para='$me';";
}
else{
	$sql = "SELECT * from actividad where actividad.categoria!='Personal'";
}
	/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $conn->query($sql)) {
	$json = array();
   while($row = mysqli_fetch_array ($resultado))
{
	$color='rojo';
	if($row['estatus']<='10'){
		$color='rojo';
	}else{
		if($row['estatus']<='50'){
			$color="naranja";
		}else{
			if($row['estatus']<='99'){
				$color="amarillo";
			}else{
				$color="verde";
			}
		}
	}
    $bus = array(
        'id' => $row['id'],
        'titulo' => $row['titulo'],
        'descripcion' => $row['descripcion'],
        'estatus' => $row['estatus'],
        'tiempo' => $row['tiempo'],
        'entregable' => $row['entregable'],
        'from' => $row['from'],
        'para' => $row['para'],
        'obstaculos' => $row['obstaculos'],
        'fecha' => $row['fecha'],
        'topico' => $row['topico'],
        'lab' => $row['lab'],
        'color' => $color,
				'prioridad' => $row["prioridad"],
				'categoria' => $row["categoria"]
    );
    array_push($json, $bus);
}
$json=array_reverse($json);
echo json_encode(array("response"=>"OK","detail"=>$json));
//$chat=$json;
    /* liberar el conjunto de resultados */
    $resultado->close();
}
else {
   echo json_encode(array("response"=>"ERROR","detail"=>$conn->error));
}


?>
