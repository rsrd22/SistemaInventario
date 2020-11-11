<?php
include(HTML_DIR . 'overall/header.php');
?>
<link rel="stylesheet" type="text/css" href="views/css/estilos.css">

<body >
	<script src="views/js/funciones_categorias.js"></script>

    <h1>Agregando Categorias</h1>
    <ul class="nav navbar-nav navbar-right" role="tablist"> 						
        <li class=""><a href="#"><?php echo $_SESSION['app_usuario'];?></a></li>
        <li class=""><a href="?view=index">Inicio</a></li>
        <li class=""><a href="?view=categorias">Categorias</a></li>
        <li class=""><a href="?view=logout">Cerrar Sesion</a></li>
    </ul>
	<!--LOGIN-->
	<div class="table-responsive" style="width: 70%; margin:0 auto;">
		<?php
			if(isset($_GET['success'])){
				echo '<div class="alert alert-dismissible alert-success"> 
				<strong>Completado!</strong> La categoria ha sido ingresada exitosamente.
				</div>';
			}

			if(isset($_GET['error'])){
				echo '<div class="alert alert-dismissible alert-danger"> 
					<strong>Error!</strong> Los campos deben estar llenos.
					</div>';
			}
		?>	
		<form  class="form-horizontal" action="?view=categorias&mode=add" method="POST" enctype="application/x-www-form-urlencoded">			
			<div class="form-group">
				<label for="codigo" class='col-lg-2 control-label'>Categoria:</label>
				<div class="col-lg-10">
				<input class="form-control" type="text" id="txtCategoria" name="descripcion" placeholder="Categoria" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button class="btn btn-primary " title="Guardar" type="submit" >
						Guardar
					</button>	
					<button class="btn btn-primary " title="Limpiar" type="reset" >
						Limpiar
					</button>	
				</div>
			</div>
			
		</form>
	</div>
    

<!--PIE DE PAGINA-->
<?php
include(HTML_DIR . 'overall/footer.php');
?>

