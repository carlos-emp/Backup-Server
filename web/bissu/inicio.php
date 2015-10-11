<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="css/materializaer.css">

		<!-- Compiled and minified JavaScript -->
		<script src="js/materializer.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>

		<link rel="stylesheet" href="css/index.css" />
		<title>Inicio</title>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav class="pink darken-2">
				<a href="#!" class="brand-logo">
					<img src="img/logos/bboutique.png" style="max-height: 60px; max-width: auto" />
				</a>
				<ul class="right">
					<li>
						<a href='#'> <?php
						if (isset($_SESSION['nombre'])) {
							echo "" . $_SESSION['nombre'];
						} else {
							header("Location: login.php");
							die();
						}
						?></a>
					</li>
					<li>
						<a href='logout.php'>Cerrar Sesion</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="container">
			<div ng-app="Cotizador">


<p>Escribe y selecciona un producto para poder añadirlo a la cotización presionando el botón <i class="fa fa-plus-square"></i></p>
<div ng-controller="UsersController">
<div class="row">
	<input id="senseInput" type="text" ng-model="name" placeholder="Producto" class="col s6">
	<div class="col s1" style="text-align: center"><i class="fa fa-arrow-right" style="margin-bottom: 0px"></i></div>
	<input id="cantidadInput" type="number" ng-model="cantidad" placeholder="#" class="col s1">
	<button id="agregar" class="btn waves-effect waves-light col s1 disabled" ng-click="agregarFila()" ><i class="fa fa-plus-square"></i></button>
	<button id="reinicia" class="btn waves-effect waves-light col s1" ng-click="reset()"><i class="fa fa-refresh"></i></button>
</div>
<div id="sense" style="background-color: #eceff1; width:200px; height:115px; overflow: scroll; display: none; position: fixed">
<p ng-repeat="item in items.detail | filter:name" ng-click="completar(item);" class="sense-item">{{item.ARTiCULO}}</p>
</div>

<div class="row">
	<div class="col s1">Num.</div>
	<div class="col s4">Producto</div>
	<div class="col s2">Precio</div>
	<div class="col s3">Cantidad</div>
	<div class="col s2">Total</div>
</div>
<table id="tabla" style="height:285px; overflow: scroll;">

</table>
<div style="margin-top: 30px">

<div class="row">
	<div class="col s1"></div>
	<div class="col s4"></div>
	<div class="col s2"></div>
	<div class="col s3">Sub Total</div>
	<div class="col s2">{{totalCol}}</div>
</div>
<div class="row">
	<div class="col s1"></div>
	<div class="col s4"></div>
	<div class="col s2"></div>
	<div class="col s3">IVA 16%</div>
	<div class="col s2">{{sub}}</div>
</div>
<div class="row">
	<div class="col s3">Total</div>
	<div class="col s2"><strong>{{totalFinal}}</strong></div>
	<div class="col s3"><form id="f2" action="ws/print.php" method="post" target="_blank"><input type="hidden" name="mtotales" id="mtotales" /><input type="hidden" name="mihtml" id="mihtml" /><button id="imprime" class="btn waves-effect waves-light" type="submit">Efectuar</button></form></div>
</div>
</div>
			</div>
		</div>
	</body>
</html>
