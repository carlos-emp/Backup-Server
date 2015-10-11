<?php

session_start();
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['nivel'] = $_POST['nivel'];

echo json_encode(array("nivel"=>$_POST["nivel"]));

 ?>