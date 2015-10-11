




<?php
if($_POST)
{
	$gas = $_POST["gas"];
	$rfc = $_POST["rfc"];
	$folio = $_POST["folio"];
	
	
	//var_dump($gas);
	//var_dump($rfc);
	//var_dump($folio);
	
	$claseFolio = "";
	$claseGas ="";
	$claseRfc = "";
	
	
	if($gas == "") 
	{
	    $msgGas = "Selecciona el número de la estación en donde realizaste la carga";
		$claseGas = "error";
	}
	
	
	
	if($rfc == "")
	{
		$msgRfc = "Falta RFC";
		$claseRfc = "error";
	}
	
	
	
	
	if($folio == "") 
	
	{
		$msgFolio = "Falta que digites tu fólio";
		$claseFolio = "error";
	}
	
	
	
}

?>

<!--<!doctype html>-->
<html>
<!---validación del formulario---->


<!--<script>
public boolean validarrfc(String rfc)
{
	rfc=rfc.toUpperCase().trim();
	return
	rfc.toUpperCase().matches("[A-Z]{4}[0-9]{6}[A-Z0-9]{3}");
}


</script>-->



<head>
<meta charset="utf-8">
<title>Archivos electrónicos</title>
</head>

<style>
div label{
	
	display: block;
	width:25%
}

input border{
	border:solid 2px #0F723F;
}
.error{
	border: solid 1 px  #F90716;
}

</style>



<body>
<h1>Obten tus archivos XML y PDF </h1>
<form method="post" action="download.php"> 
<fieldset  style="width:28%"> 
<legend><font face="Baskerville, Palatino Linotype, Palatino, Century Schoolbook L, Times New Roman, serif" size="+1">  Escribe tus datos </font> </legend>

  <p>
  <div>
  <select name="gas" class="<? echo $claseGas ?>">
    <option>---selecciona----</option>
    <option>1 </option>
    <option>2</option>
    <option>3 </option>
  </select>
  </div>
  <br>
  <div>
    <input type="text" name="rfc" class="<? echo $claseRfc ?>"> 
    &nbsp; RFC
    </p>
  </div>
  <div>
    <input type="text" name="folio" class="<? echo $claseFolio ?>">&nbsp;
    Fólio </div>
 <br>

<input type="submit" value="Buscar">


</fieldset>

</form>


</body>
</html>