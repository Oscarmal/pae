<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);?>
<?php 
/* O3M
* Manejador de Vistas
* Dependencia: tpl.views.vars.php
* Modulos => $in[m]; Secciones => $in[s];
*/
// Valida parametro URL
if(!$in[m]){header('location: '.$Raiz[url]);}
// Modulos
$modulo = array(
			 GENERAL 	=> 'tpl.views.vars.php'
			,CAPTURA 	=> 'tpl.views.vars.captura.php'
			,CONSULTAS 	=> 'tpl.views.vars.consultas.php'
			,REPORTES 	=> 'tpl.views.vars.reportes.php'
			,ADMIN 		=> 'tpl.views.vars.admin.php'
			);
$mod = enArray($in[m],$modulo);
require_once($Path[src].$modulo[$mod]);
$seccion = $in[s];
$vista = vistas($seccion);
$tpl_data = tpl_vars($seccion,$ins);
print(contenidoHtml($vista, $tpl_data));
/*O3M*/
?>
