<?php

if (!empty($_POST['user']) and !empty($_POST['pass'])) {
	$db = new Conexion();
	$user = $db->real_escape_string($_POST['user']);
	$pass = Encrypt($_POST['pass']);
	echo $user.'-----'.$pass;
	$con = "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$pass' LIMIT 1;";
	$sql = $db->query($con);

	$rs = $db->rows($sql);
	if ($rs > 0) {
		$informacion = $db->recorrer($sql);
		$_SESSION['app_id'] = $informacion['id'];
		$_SESSION['app_usuario'] = $informacion['usuario'];
		$_SESSION['app_id_perfil'] = $informacion['id_perfil'];

		## if($_POST['session']){
		##	ini_set('session.cookie_lifetime', time()+(60*60*24));
		## }

		if ($informacion['estado'] == 'Activo') {
			echo 1;
		} else {
			echo '<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">X</button>
				  <strong>Error:</strong> El usuario se encuentra INACTIVO. <br>Por comuniquese con el administrador del sistema
                 </div>';
		}
	} else {
		echo '<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">X</button>
			  <strong>Error:</strong> Las credenciales son incorrectas.
			</div>';
	}

	$db->liberar($sql);
	$db->close();
}
