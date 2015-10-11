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
					$("#regForm :input:button").attr("disabled", true);
					var url = "http://www.empowerlabs.com/proyectos/trackersAPI/rePass.php";
					// the script where you handle the form input.
          $.ajax({
            url: 'ws/users/getUser.php',
            type: 'POST',
            data: {correo: $('#email').val()}
          })
          .done(function(data2) {
            var data=data2;
            data=JSON.parse(data);
              console.log("success"+data.detail[0].nombre);
            $.ajax({
              url: 'http://www.empowerlabs.com/proyectos/trackersAPI/rePass.php',
              type: 'POST',
              data: {nombre: ''+data.detail[0].nombre,pass: ''+data.detail[0].pass,to: ''+data.detail[0].correo},
            })
            .done(function(data) {
              console.log("success");
      					$('#localmodal').fadeOut();
      					$("#regForm :input:button").removeAttr("disabled");
              alert(data);
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });

          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });

                    return false;
                    // avoid to execute the actual submit of the form.
        });
      });
    </script>

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
			<h3 class="header">Recuperar contraseña</h3>
			<div id="localmodal" class="modal-content" style="text-align: center;display: none">
				<h4><i class="fa fa-cog fa-spin"></i></h4>
				<p>
					Solicitando password...
				</p>
			</div>
			<div class="row">
				<form class="col s12 grey lighten-4" id="regForm" method="POST" action="#">
					<div class="row">
						<div class="input-field col s4">
						</div>
						<div class="input-field col s4">
  							<input id="email" name="email" type="email" required class="validate">
  							<label for="email">Email</label>
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
