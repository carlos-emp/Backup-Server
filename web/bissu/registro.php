<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/index.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="css/materializaer.css">

		<!-- Compiled and minified JavaScript -->
		<script src="js/materializer.js"></script>
		<script>
			$(document).ready(function() {
				$("#regForm").submit(function() {
					$('#localmodal').fadeIn();

					$("#logueo2 :input:button").attr("disabled", true);
					var url = "ws/users/insert.php";
					// the script where you handle the form input.
					var length = 8,
        		charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        		retVal = "";
    			for (var i = 0, n = charset.length; i < length; ++i) {
        		retVal += charset.charAt(Math.floor(Math.random() * n));
    				}
					$.ajax({
						type : "POST",
						url : url,
						data : $("#regForm").serialize()+ '&' + $.param({
							password : retVal
						}), // serializes the form's elements.
						success : function(data) {
							data=jQuery.parseJSON(data);

					$("#logueo2 :input:button").attr("disabled", false);
							if(data.response==='OK'){
								//Materialize.toast('Registro exitoso! ', 4000,'',function(){window.location ="login.php"})
								$('#localmodal').fadeOut();
								alert("Su formulario ha sido enviado con éxito. Contestaremos a su petición en un lapso máximo de 72 horas. Bissú Boutique Puebla agradece su preferencia.");
								window.location ="login.php";
							}
							else{
								$('#localmodal').fadeOut();
								alert(data.detail);
							}

							// show response from the php script.
						}
					});

					return false;
					// avoid to execute the actual submit of the form.
				});
			});
		</script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<title>Registro</title>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav class="pink darken-2">
				<a href="#!" class="brand-logo"><img src="img/logos/logo-footer.png" style="max-height: 60px; max-width: auto" /></a>
				<ul class="right">
					<li>
						<a href="login.php">Login</a>
					</li>
				</ul>
			</nav>
		</div>
		<div  class="container">
			<h3 class="header">Solicitud de Registro</h3>
			<div id="localmodal" class="modal-content" style="text-align: center;display: none">
				<h4><i class="fa fa-cog fa-spin"></i></h4>
				<p>
					Guargando usuario...
				</p>
			</div>
			<div class="row">
				<form class="col s12 grey lighten-4" id="regForm" method="POST" action="#">
					<div class="row">
						<div class="input-field col s6">
							<input id="first_name" name="first_name" type="text" required class="validate">
							<label for="first_name">Nombre (s)</label>
						</div>
						<div class="input-field col s6">
							<input id="last_name" name="last_name" type="text" required class="validate">
							<label for="last_name">Apellidos</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<input id="email" name="email" type="email" required class="validate">
							<label for="email">Email</label>
						</div>
						<div class="input-field col s4"></div>
						<div class="input-field col s4">
							<input id="telefono" name="telefono" type="tel" required class="validate">
							<label for="telefono">Telefono</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<input id="celular" name="celular" type="tel" required class="validate">
							<label for="celular">Celular</label>
						</div>
						<div class="input-field col s4">
						</div>
						<div class="input-field col s4">
							<select id="sexo" name="sexo" autofocus required class="browser-default validate">
								<option value="a">Mujer</option>
								<option value="o">Hombre</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
							<input id="estado" name="estado" type="text" required class="validate">
							<label for="estado">Entidad ej. PUEBLA PUE</label>
						</div>
						<div class="input-field col s8">
							<input id="direccion" name="direccion" type="text" required class="validate">
							<label for="direccion">Dirección</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s4">
						</div>
						<div class="input-field col s4">
							<div class="g-recaptcha" data-sitekey="6LehxQoTAAAAANK62kLA450czsS2SBIt25ZiwEAL"></div>
						</div>
						<div class="input-field col s4">
						</div>
					</div>
					<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
						<button type="submit" id"lanzar" class="btn-floating btn-large pink darken-2 modal-trigger">
							<i class="fa fa-send"></i>
						</button>
						<!--<ul>
						<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
						<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
						<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
						<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
						</ul>-->
					</div>
				</form>
			</div>
		</div>
	</body>
