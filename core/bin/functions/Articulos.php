<?php

function Articulos($inventario, $servicios){
	$articulos = array();
	foreach ($inventario as $idinventario => $value) {
		array_push($articulos, $inventario[$idinventario]['descripcion']);
	}

	foreach ($servicios as $idservicio => $value) {
		array_push($articulos, $servicios[$idservicio]['descripcion']);
	}

	return $articulos;

}

?>