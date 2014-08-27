<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);

// session_destroy();
if($ins[txtUsuario] && $ins[txtClave]){
	if($usuario = login($ins[txtUsuario], $ins[txtClave])){
		$_SESSION['usuario'] = $usuario[id_usuario];
		$_SESSION['grupo'] 	 = $usuario[grupo];
		// header('location: index2.php');
		$modulo = encrypt('GENERAL');
		$seccion = encrypt('INICIO');
		$resultado = "index.php?m=$modulo&s=$seccion";
	}else{
		$modulo = encrypt('GENERAL');
		$seccion = encrypt('LOGIN');
		$resultado = "index.php?m=$modulo&s=$seccion&er=1";
	}
	return $resultado;
}
?>