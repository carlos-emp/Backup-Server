<?php

  $nombre=utf8_decode($_POST["first_name"]);
  $apellido=utf8_decode($_POST["last_name"]);
  $pass=$_POST["password"];
  $estado=utf8_decode($_POST["estado"]);
  $direccion=$_POST["direccion"];
  $email=$_POST["email"];
  $telefono=$_POST["telefono"];
  $celular=$_POST["celular"];


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

  $estado='SIN_ESTADO';

  $sql = "INSERT INTO clientes VALUES ('$nombre $apellido',
   '$telefono $celular',
   '$estado',
   '$email',
   '',
   '$pass',
   'no',
   '',
   NULL,
   '');";

  if ($conn->query($sql) === TRUE) {
      $estado="SE_CREA";
      echo json_encode(array("response"=>"OK","detail"=>$time,"estado"=>$estado));
  } else {
      $estado="YA_EXISTIA";
      echo json_encode(array("response"=>"ERROR","detail"=>$conn->error,"estado"=>$estado));
  }

  $conn->close();
 ?>
