<?php
    require_once("cnx.php");
    $link=  connecta();
if(isset($_POST['nombre'])==isset($_SESSION["nombre"])){
     
// Realizar una consulta MySQL
$query = 'SELECT * FROM usuarios where nombre="'.$_POST['nombre'].'" && pass="'.$_POST['pwd'].'"';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if(count($result)=="1"){echo "si";}
// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
$_SESSION['nombre'] = $_POST['nombre'];

    session_start();
echo "Bienvenido! Has iniciado sesion: ".$_POST['nombre'];
}else{
if(isset($_SESSION['nombre'])){
echo "Has iniciado Sesion: ".$_SESSION['nombre'];
}else{
echo "Acceso Restringido".$_POST['nombre'];
}
}

?>