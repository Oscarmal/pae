<?php session_name('o3m'); session_start(); include_once($_SESSION['header_path']);?>
<?php 
/* O3M
* Manejador de Vistas
* Dependencia: tpl.views.vars.php
* Modulos => $in[m]; Secciones => $in[s];
*/
// Modulos
$mod = strtoupper(encrypt($in[m]));
$modulo = array(
			 GENERAL 	=> 'tpl.views.vars.php'
			,CAPTURA 	=> 'tpl.views.vars.captura.php'
			,CONSULTAS 	=> 'tpl.views.vars.consultas.php'
			,REPORTES 	=> 'tpl.views.vars.reportes.php'
			,ADMIN 		=> 'tpl.views.vars.admin.php'
			);
require_once($Path[src].$modulo[$mod]);

// Impresión de vista
$secion = encrypt($in[s]);
$vista = vistas($secion);
$tpl_data = tpl_vars($secion);
print(contenidoHtml($vista, $tpl_data));
/*O3M*/
?>
