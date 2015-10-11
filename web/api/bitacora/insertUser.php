<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$wikiname = $_GET["wikiname"];
$pass = $_GET["password"];

if(isset($wikiname) && isset($pass)){

  // Variables del formulario


  // Conexión con el servidor y BD
  $server="localhost";
  $user="root";
  $password="19Alex90";
  $db="bitacora";

  $mysqli = new mysqli($server ,$user, $password, $db);

  // Revisar Conexión
  if (mysqli_connect_errno()) {
    echo json_encode(array("resultado"=>"false","mensaje"=>"Error de conexión [".mysqli_connect_error()."]"));
    exit();
  }
  // Encriptación del password a 40 caracteres
  $salt = '*_3Mp0W3rL485_*';
  $pass = sha1(md5($salt.$pass));


  // Componer query
  $query = "INSERT INTO colaborador VALUES ('$wikiname','$pass')";
  // printf("Wikiname: ".$wikiname."\n Password: ".$pass."\n".$query."\n");
  // Revisar error
  if(!$mysqli->query($query)){
    echo json_encode(array("resultado"=>"false","mensaje"=>"Ocurrió un error [" . $mysqli->error . "]"));
  }
  // Usuario registrado
  else{
    echo json_encode(array("resultado"=>"true","mensaje"=>"Usuario registrado"));
  }
  /* close connection */
  $mysqli->close();
}
// Cuando los campos recibidos del formulario están vacios
else{
  echo json_encode(array("resultado"=>"false","mensaje"=>"Uno o más campos vacíos"));
}
?>
