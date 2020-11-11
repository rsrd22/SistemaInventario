<?php

session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sistemainventario');

define('HTML_DIR', 'html/');
define('APP_TITLE', 'Sistema de inventario');
define('APP_URL', 'http://localhost/SistemaInventario/');


require('core/models/class.Conexion.php');
require('core/models/class.Categorias.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Categorias.php');
// require('core/bin/functions/Servicios.php');
// require('core/bin/functions/Articulos.php');
// require('core/bin/functions/Egresos.php');
// require('core/bin/functions/PaginadorInventario.php');
// require('core/bin/functions/PaginadorServicios.php');
// require('core/bin/functions/Perfiles.php');

$_categorias = Categorias();
// $_inventario = Inventario();
// $_servicios = Servicios();
// $_articulos = Articulos($_inventario, $_servicios);
