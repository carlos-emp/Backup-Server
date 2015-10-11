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

		<link rel="stylesheet" href="css/index.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="css/materializaer.css">

		<!-- Compiled and minified JavaScript -->
		<script src="js/materializer.js"></script>

		<script src="lib/onsen/js/angular/angular.js"></script>
		<script src="lib/onsen/js/onsenui.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<title>Bissú Cotizador</title>
	</head>
	<body>
		<?php
if(isset($_SESSION['nombre'])){
header("Location: inicio.php");
die();
}else {
		?>
		<script>
			$(document).ready(function(){

				$("#logueo2").submit(function() {
					$('#localmodal').fadeIn();
					$("#logueo2 :input:button").attr("disabled", true);
					var url = "ws/users/isUser.php";
					// the script where you handle the form input.

					$.ajax({
						type : "POST",
						url : url,
						data : $("#logueo2").serialize(), // serializes the form's elements.
						success : function(data) {

							$('#localmodal').fadeOut();
					$("#logueo2 :input:button").attr("disabled", false);
							if(data.detail===1){
								//Materialize.toast('Registro exitoso! ', 4000,'',function(){window.location ="login.php"})

								var url="ws/sesion.php"
								$.ajax({
						type : "POST",
						url : url,
						data : {"nombre": $('#first_name').val(),"pass" : $('#pass').val(),"nivel":data.nivel}, // serializes the form's elements.
						success : function(data) {
							data=jQuery.parseJSON(data);
							$('#localmodal').fadeOut();
								if(data.nivel!=="admin"){
								window.location ="inicio.php";
								}else{
									window.location ="admin.php";
								}
							}

							// show response from the php script.
					});
							}
							else{
								$('#localmodal').fadeOut();
								alert('Usuario o Contraseña incorrectos');
							}

							// show response from the php script.
						}
					});

					return false;
					// avoid to execute the actual submit of the form.
				});
			});
		</script>
		<div id="localmodal" class="modal-content" style="text-align: center;display: none">
				<h4><i class="fa fa-cog fa-spin"></i></h4>
				<p>
					Comprobando usuario...
				</p>
			</div>
		<div class="login-form2">
			<div class="center">

				<form style="text-align: center" id="logueo2" action="inicio.php" method="POST">
					<br>
					<img src="img/logos/bissu.png" style="height: 130px; max-width: 245px"/>
					<br>
					<br>
					<br>

					<div class="input-field col s6">
						<i class="fa fa-user prefix"></i>
						<input type="text" placeholder="Tu Usuario!" name="nombre" required id="first_name" class="validate">
					</div>
					<br>
					<div class="input-field col s6">
						<i class="fa fa-lock prefix"></i>
						<input type="password" placeholder="Tu Contraseña!" name="pass" required id="pass" class="validate"/>
					</div>
					<br>
					<br>
					<button type="submit" class="btn waves-effect waves-light">
						Log in
						<i class="fa fa-sign-in"></i>
					</button>
					<br>

				</form>
				<br>

		<a href="registro.php">Registrarse</a><br>
		<a href="recuperar.php">Olvide mi contraseña</a>
			</div>

		</div>
		<?php
		}
		?>
	</body>
</html>
