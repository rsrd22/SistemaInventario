<?php 

	function Egresos($fecha, $tipo){
		$db = new Conexion();

		$formato = "";
		$where = "";
		if($tipo == 0){//DIARIO
			$formato = "%Y-%m-%d";
			$where = " WHERE DATE_FORMAT(fecha, '".$formato."') = DATE_FORMAT('".$fecha."', '".$formato."')";
		}else if($tipo == 1){//SEMANAL
			$formato = "%Y-%m-%d";
			$where = " WHERE DATE_FORMAT(fecha, '".$formato."') 
						BETWEEN DATE_FORMAT(DATE_SUB('".$fecha."', INTERVAL DAYOFWEEK('".$fecha."')-1 DAY), '".$formato."') 
						AND DATE_FORMAT(DATE_ADD('".$fecha."', INTERVAL 7-DAYOFWEEK('".$fecha."') DAY), '".$formato."')";
		}else if($tipo == 2){//MENSUAL
			$formato = "%Y-%m";
			$where = " WHERE DATE_FORMAT(fecha, '".$formato."') = DATE_FORMAT('".$fecha."', '".$formato."')";
		}else{//ANUAL
			$formato = "%Y";
			$where = " WHERE DATE_FORMAT(fecha, '".$formato."') = DATE_FORMAT('".$fecha."', '".$formato."')";	
		}

		$consulta = "SELECT * FROM egresos ".$where;

		$sql = $db->query($consulta);

		if($db->rows($sql) > 0){
		while($data = $db->recorrer($sql)){
			$egresos[$data['pk_egresos']] = array(
				'pk_egresos' => $data['pk_egresos'],
				'descripcion' => $data['descripcion'],
				'monto' => $data['monto'],
				'fecha' => $data['fecha']
			);
		}
	}else{
		$egresos = false;
	}

	$db->liberar($sql);
	$db->close();

	return $egresos;
	}

 ?>