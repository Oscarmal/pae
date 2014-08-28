<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
// Define modulo del sistema
define(MODULO, $in[modulo]);
// Archivo DAO
require_once($Path[src].MODULO.'/dao.login.php');
// Lógica de negocio
if(!empty($ins[usuario]) && !empty($ins[clave])){
	if($usuario = login($ins[usuario], $ins[clave])){
		$modulo = encrypt('GENERAL',1);
		$seccion = encrypt('INICIO',1);
		$_SESSION['usuario'] 	 = $usuario[id_usuario];
		$_SESSION['id_personal'] = $usuario[id_personal];
		$_SESSION['grupo'] 		 = $usuario[grupo];		
		$url = "?m=$modulo&s=$seccion";
		$success = true;
	}else{
		$modulo = encrypt('GENERAL',1);
		$seccion = encrypt('LOGIN',1);
		$url = "?m=$modulo&s=$seccion&er=1";
		$success = false;		
	}
	$data = array(success => $success, url => $url);
	$data = json_encode($data);
}
// Resultado
echo $data;
/*O3M*/
?>