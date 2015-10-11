<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
 $todo=array();
$texto=file_get_contents("../../intellibanks/data/.htpasswd");
 $lines = explode("\n",$texto);
 for($i=0;$i<count($lines)-1;$i++){
 	$usuario=explode(":",$lines[$i]);
 	$todo[]=$usuario[0];
 }
echo json_encode($todo);
?>