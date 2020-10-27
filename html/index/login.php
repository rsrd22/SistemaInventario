<?php
include(HTML_DIR . 'overall/header.php');
?>
<link rel="stylesheet" type="text/css" href="views/css/estilos_login.css">

<body data-spy="scroll" data-target="#navigationDiplo">
	<script src="views/js/funciones_login.js"></script>
	<section class="jumbotron ">
		<div class="container">
			<h1>Inventario</h1>
		</div>
	</section>
	<!--LOGIN-->
	<section class="login">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id='_AJAX_LOGIN_' class="form-wrap">

					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="card">
						<div class="card-header">
							<h1>Inicio Sesion</h1>
						</div>
						<div class="card-body">
							<div role="form" onkeypress="return runScriptLogin(event);">
								<div class="form-group">
									<label for="usuario" class="sr-only">Usuario</label>
									<input type="text" name="usuario" id="usuario_login" class="form-control" placeholder="Usuario">
								</div>
								<div class="form-group">
									<label for="key" class="sr-only">Contraseña</label>
									<input type="password" name="pass" id="pass_login" class="form-control" placeholder="Contraseña">
								</div>
								<div class="form-group">
									<input type="checkbox" id="session_login" checked>
									<label>Recordarme</label>
								</div>
								<button type="button" id="btn-login" class="btn btn-lg btn-block btn-performance" value="Entrar" onclick="goLogin();">Entrar</button>
							</div>
						</div>
						<div class="card-footer">

						</div>
					</div>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
			</div>
		</div>
	</section>
	<!--PIE DE PAGINA-->
	<?php
	include(HTML_DIR . 'overall/footer.php');
	?>


</body>

</html>