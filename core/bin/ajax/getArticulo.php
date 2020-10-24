<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'variedadesnaya');
	require('../../models/class.Conexion.php');
	$nombre = $_GET['articulo'];

	$db = new Conexion();

	$consulta = "SELECT inv.fk_articulo AS id_elemento, inv.`stock` AS stock, art.`valor_venta` AS valorv, 'a' AS tipo
					FROM inventario inv 
					INNER JOIN articulos art ON art.`pk_articulo` = inv.`fk_articulo`
					WHERE art.`descripcion` = '$nombre'
					UNION
					SELECT pk_servicio AS id_elemento, '1' AS stock, valor AS valorv, 's' AS tipo 
					FROM servicios 
					WHERE descripcion = '$nombre'";

	$sql = $db->query($consulta);

	if($db->rows($sql) > 0){
		$articulo = mysqli_fetch_object($sql); 	
		$articulo ->status =  200;	
		echo json_encode((object)$articulo);
	}else{
		
		$error = array('status' => 400);
		echo json_encode((object)$error);
	}

	$db->liberar($sql);
	$db->close();

	

?>