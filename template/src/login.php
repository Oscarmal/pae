<?php #session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
require_once('common/php/inc.header.php');
session_destroy();
if($ins[txtUsuario] && $ins[txtClave]){
	// $auth = SQLQuery('select * from speedtest;');
	$_SESSION['usuario'] = 1;
	header('location: index2.php');
}
?>