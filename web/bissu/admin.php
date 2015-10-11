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

    		<link rel="stylesheet" href="lib/onsen/css/onsenui.css"/>
    		<link rel="stylesheet" href="lib/onsen/css/onsen-css-components.css"/>
    		<script src="lib/onsen/js/angular/angular.js"></script>
    		<script src="lib/onsen/js/onsenui.js"></script>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="css/materializaer.css">

		<!-- Compiled and minified JavaScript -->
		<script src="js/materializer.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>

		<link rel="stylesheet" href="css/index.css" />
		<style>
::-webkit-scrollbar {
    display: block !important;
    width: 5px;
    height: 0px;
}

::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.1);
}

::-webkit-scrollbar-thumb {
    border-radius: 2px;
    background: rgba(0,0,0,0.3);
    -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.5);
}
.plan-list {
  border-top: none;
  background-image: none !important;
}

.plan {
  line-height: 1;
  padding: 0;
}

.plan-left {
  text-align: right;
  padding: 10px 10px 10px 0;
}

.plan-center {
  background-color: #3399ff;
  opacity: 0.5;
}

.plan-right {
  padding: 10px 40px 10px 10px;
}

.plan-date {
  font-size: 14px;
  opacity: 0.8;
  margin-bottom: 4px;
  font-weight: 500;
}

.plan-duration {
  font-size: 11px;
  opacity: 0.4;
}

.plan-name {
  font-size: 17px;
  margin-bottom: 8px;
}

.plan-info {
  opacity: 0.4;
  font-size: 12px;
  line-height: 1.4;
}
</style>
		<title>Administrador</title>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav class="pink darken-2">
				<a href="#!" class="brand-logo"><img src="img/logos/logo-footer.png" style="max-height: 60px; max-width: auto" /></a>
				<ul class="right">
					<li>
						<a href='#'> <?php
						if (isset($_SESSION['nombre'])&&isset($_SESSION['nivel'])) {
							if($_SESSION['nivel']==='admin'){
								echo "" . $_SESSION['nombre'];
							}else{
								header("Location: login.php");
								die();
							}

						} else {
							header("Location: login.php");
							die();
							//echo "" . $_SESSION['nombre']. $_SESSION['nivel'];
						}
						?></a>
					</li>
					<li>
						<a href="inicio.php">Cotizador</a>
					</li>
					<li>
						<a href='logout.php'>Cerrar Sesion</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="container" ng-app='Administrador'>
		<div class="navigation-bar">
				<div class="navigation-bar__center">

					<input id="enter" type="search" style="width: 100%; margin: 6px auto 6px auto;" placeholder="Buscar" ng-model="entradaPendiente">

				</div>
			</div>
			<ons-list-header style=" margin-top: 35px;">Solicitudes Pendientes</ons-list-header>
			<ons-list ng-controller="PendientesController" style=" height: 500px; overflow: scroll">

				<div class="center" id='loading'><i class='fa fa-cog fa-5x fa-spin'></i><br>Cargando...</div>
				<ons-list-item modifier="chevron" class="plan" ng-repeat="inactiva in inactivas | filter: entradaPendiente" ng-click="confirmar(inactiva)">

					<ons-row>
              <ons-col width="80px" class="plan-left">
                <div class="plan-date"></div>
              </ons-col>

              <ons-col width="6px" class="plan-center" ng-style="{backgroundColor:a % 3 == 1 ? '#3399ff' : '#ccc'}">
              </ons-col>
              <ons-col class="plan-right">
                <div class="plan-name">{{inactiva.nombre}}</div>

                <div class="plan-info">
                  <div ng-hide="a % 4 == 0">
                    <ons-icon icon="fa-phone"></ons-icon> {{inactiva.telefono}}
                  </div>

                  <div ng-hide="a % 3 == 0">
                    <ons-icon icon="fa-map-marker"></ons-icon> {{inactiva.entidad}}
                  </div>
                </div>
              </ons-col>
            </ons-row>
				</ons-list-item>
			</ons-list>
		</div>
	</body>
</html>
