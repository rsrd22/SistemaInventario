<?php
include(HTML_DIR . 'overall/header.php');
?>
<h1>bienvenido</h1>
<ul class="nav navbar-nav navbar-right" role="tablist"> 						
    <li class=""><a href="#"><?php echo $_SESSION['app_usuario'];?></a></li>
    <li class=""><a href="?view=categorias">Categorias</a></li>
    <li class=""><a href="?view=logout">Cerrar Sesion</a></li>
</ul>

<?php
include(HTML_DIR . 'overall/footer.php');
?>