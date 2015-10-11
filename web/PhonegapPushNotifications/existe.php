<?php
    
header("Content-Type: application/json");
// respuesta json 
$json = array(); 
/*---- 
    Registrando el dispositivo del usuario 
    guardamos el id de registro(registration id) en la tabla de usuarios 
----*/ 
if (isset($_POST["regId"])) { 
    $gcm_regid = $_POST["regId"]; // GCM ID de Registro 
    // Guardamos lo detalles del usuario en la DB 
    include_once 'funciones.php'; 

    $db = new DB_Functions(); 

    $res = $db->existira($gcm_regid); 

    echo json_encode(array("respuesta"=>$res));
} else { 
    // user details missing 
} 
?>