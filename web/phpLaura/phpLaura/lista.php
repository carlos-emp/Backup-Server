<?php
header("Content-type: text/html");
$rfc= $_POST["rfc"];
$dir="extras/pdf/";
$dr=@opendir($dir);
if(!$dr){
echo "<error/>";
exit;
} else {
echo "<section>";
// recorremos todos los elementos de la carpeta
while (($archivo = readdir($dr)) !== false) {
// comprobamos que sean archivos y no otras carpetas
if(filetype($dir . $archivo)!="dir"){
$tam=round(filesize($dir . $archivo)/1024,0);
//echo "<a href='file/$archivo' >$archivo  </a></br>";
//$palabras=explode("_",$archivo,20);
//if($palabras[3]==$rfc||$palabras[2]==$rfc||$palabras[4]==$rfc)
$palabras=explode('__',$archivo);
$palabras2=explode('.',$palabras[1]);
if(utf8_encode($palabras2[0])===utf8_encode($rfc))
{
	echo "<a href='download.php/?file=$archivo' >$archivo  </a></br>";
}
else{
	//echo $palabras2[0] ."=>".$rfc."<br>";
}
}
}
echo "</section>";
closedir($dr);
}
?>