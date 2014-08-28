<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);

require_once($Path[src].'dao.login.php');
if(!empty($ins[usuario]) && !empty($ins[clave])){
	if($usuario = login($ins[usuario], $ins[clave])){
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
echo $ins[usuario];
?>