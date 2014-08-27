<?php
/* O3M
* Manejador de Vistas y asignación de variables
* Dependencia: cmd.tpl_vars.php
*/

# Vistas
$vistas = array(
			 LOGIN 	=> 'login.html'
			,INICIO => 'incio.html'
			,ERROR 	=> 'error.html'
			);

# Comandos
function vistas($cmd){
	global $vistas;
	$comando = strtoupper($cmd);
	if(array_key_exists($comando,$vistas)){
		$html = $vistas[$comando];
	}else{
		$html = $vistas[ERROR];
	}
	return $html;
}

# Variables
function tpl_vars($cmd){
	if($cmd == 'login'){
		$vars = vars_login();
	}elseif($cmd == 'inicio'){
		$vars = vars_inicio();
	}else{
		$vars = vars_error($cmd);
	}
	return $vars;
}

#############
// Funciones para asignar variables a cada vista
// $negocio => Logica de negocio; $texto => Mensajes de interfaz

function vars_login(){
	global $Path, $dic; 
	$negocio = array(
				 MORE 		=> incJs($Path[srcjs].'login.js')
			);
	$texto = array(
				 login 		=> $dic[general][login]
				,usuario 	=> $dic[general][usuario]
				,clave 		=> $dic[general][clave]
				,entrar 	=> $dic[general][entrar]
				,MSJ 		=> $dic[login][msj_entrar]
			);
	$data = array_merge($negocio, $texto);
	return $data;
}
function vars_inicio(){
	global $dic;
	$negocio = array();
	$texto = array();
	$data = array_merge($negocio, $texto);
	return $data;
}
function vars_error($cmd){
	global $dic;
	$data = array(MENSAJE => $dic[error][mensaje].': '.$cmd);
	return $data;
}
?>