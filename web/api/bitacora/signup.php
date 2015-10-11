<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

//parametros GET
$wikiname = $_GET["wikiname"];
$pass = $_GET["password"];

if(isset($wikiname) && isset($pass)){
  //variables de conexión al servidor y BD
  $server="localhost";
  $user="root";
  $password="19Alex90";
  $db="bitacora";
  $mysqli = new mysqli($server ,$user, $password, $db);
  // Revisar Conexión
  if (mysqli_connect_errno()) {
    // printf(: %s\n", mysqli_connect_error());
    echo json_encode(array("resultado"=>"false","mensaje"=>utf8_encode("Error de conexión [".mysqli_connect_error()."]")));

    exit();
  }
  else{
    // Encriptación del password a 40 caracteres
    $salt = '*_3Mp0W3rL485_*';
    $pass = sha1(md5($salt.$pass));
    $query = "SELECT * FROM colaborador WHERE wikiname ='$wikiname' and password = '$pass'";
    if(!$resultado=$mysqli->query($query)){
      echo json_encode(array("resultado"=>"false","mensaje"=>utf8_encode("Ocurrió un error [".$mysqli->error."]")));

    }
    // Usuario registrado
    else{
      if($resultado->num_rows>0){
        $filaUsuario=$resultado->fetch_assoc();
        echo json_encode(array("resultado"=>"true","usuario"=>$filaUsuario["wikiname"],"password"=>$filaUsuario["password"],"mensaje"=>"Bienvenido/a ".$filaUsuario["wikiname"]));
      }
      else{
        echo json_encode(array("resultado"=>"false","mensaje"=>utf8_encode("Usuario o contraseña incorrectos")));
      }
    }
  }
}
else{
  echo json_encode(array("resultado"=>"false","mensaje"=>utf8_encode("Uno o más campos vacíos")));
}
?>
