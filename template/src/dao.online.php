<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
/**
* 				Funciones "DAO" para función ONLINE
* Descripcion:	Ejecuta consultas SQL y devuelve el resultado.
* Creación:		2014-09-01
* @author 		Oscar Maldonado
*/
function online_select($id_usuario){
	$sql = "SELECT id_online FROM sis_online WHERE id_usuario='$id_usuario' LIMIT 1;";
	$resultado = SQLQuery($sql);
	if($resultado[0]){	
		return $resultado;
	}else{
		return false;
	}
}

function online_insert($id_usuario, $ultimo_clic){
	$sql = "INSERT INTO sis_online SET 
				online = '$ultimo_clic',
				id_usuario = '$id_usuario';";
	$resultado = (SQLDo($sql))?true:false;
	return $resultado;
}

function online_update($id_usuario, $ultimo_clic){
	$sql = "UPDATE sis_online SET 
				online='$ultimo_clic' 
				WHERE id_usuario='$id_usuario'
				LIMIT 1;";
	$resultado = (SQLDo($sql))?true:false;
	return $resultado;
}
/*O3M*/
?>