<?php
	include(HTML_DIR.'overall/header.php');
?>
<link rel="stylesheet" type="text/css" href="views/css/estilos_login.css">
<body data-spy="scroll" data-target="#navigationDiplo">
	<script src="views/js/funciones_login.js"></script>  
	<section class="jumbotron ">
		<div class="container">
			<!-- <img src="img/unimag.png" alt="" height="150"> -->
			<h1>Variedades NAYA</h1>
		</div>
	</section>
	<!--LOGIN-->
	
	<section id="login">

	    <div class="container">

	    	<div class="row">
	    	    <div class="col-xs-12 ">  
	    	    	<div id='_AJAX_LOGIN_' class="form-wrap">
				
					</div>
	        	    <div class="form-wrap">
	                <h1>Inicio Sesion</h1>
	                    <div role="form" onkeypress="return runScriptLogin(event);" >
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
	                        <button type="button" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Entrar" onclick="goLogin();">Entrar</button>
	                    </div>
	                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Olvidaste tu contraseña?</a>
	                    <hr>
	        	    </div>
	    		</div> <!-- /.col-xs-12 -->
	    	</div> <!-- /.row -->
	    </div> <!-- /.container -->
	</section>

	<?php include(HTML_DIR.'public/lostpass.html');?>

	
	<!--PIE DE PAGINA-->
	<?php
		include(HTML_DIR.'overall/footer.php');
	?>


</body>
</html>