<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
/**
* 				Funciones "DAO"
* Descripcion:	Ejecuta consultas SQL y devuelve el resultado.
* Creación:		2014-08-27
* @author 		Oscar Maldonado
*/
function login($usuario, $clave){
	$sql = "SELECT id_usuario, grupo, activo FROM $db1.he_usuarios WHERE usuario='$usuario' and clave='$clave' and activo=1 LIMIT 1;";
	$resultado = SQLQuery($sql);
	if($resultado[0]){	
		return $resultado;
	}else{
		return false;
	}
}
/*O3M*/
?>