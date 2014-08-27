<?php /*O3M*/
/**
* Descripcion:	Establece ambiente de trabajo para cada página
* Creación:		2014-06-11
* Modificación:	2014-08-25
* @author 		Oscar Maldonado - O3M
*
*/
// Establece zona horaria y tipo de codificación
date_default_timezone_set("America/Mexico_City");
header('Content-Type: text/html; charset=utf-8');
// Detección de ruta y definicion de paths de trabajo
require_once('inc.path.php');
$Raiz[local] = $_SESSION[RaizLoc];
$Raiz[url] = $_SESSION[RaizUrl];
$Raiz[sitefolder] = $_SESSION[SiteFolder];
// Validación de sesión
// if(!$_SESSION['usuario']) { 
// 	session_destroy();
// 	header('location: '.$Raiz[url].'index.php?e=2');
// 	exit();
// }
// Parsea archivo.cfg y crea $cfg[], $db[], $var[]
require_once($Raiz['local'].'common\php\inc.parse-cfg.php');
load_vars($Raiz['local'].'common\cfg\system.cfg');
// Establece variables
$Path[php]=$Raiz[local].$cfg[path_php];
$Path[js]=$Raiz[url].$cfg[path_js];
$Path[css]=$Raiz[url].$cfg[path_css];
$Path[img]=$Raiz[url].$cfg[path_img];
$Path[log]=$Raiz[local].$cfg[path_log];
$Path[tmp]=$Raiz[local].$cfg[path_tmp];
$Path[html]=$Raiz[local].$cfg[path_html];
$Path[src]=$Raiz[local].$cfg[path_src];
$Path[srcjs]=$Raiz[url].$cfg[path_src];
$Path[site]=$Raiz[local].$cfg[path_site];
// Crea variable de sesion con ruta de header
if(!isset($_SESSION['header_path'])){$_SESSION['header_path'] = $Raiz[local].$cfg[php_header];}
// Prepara archivos de apoyo
require_once($Raiz[local].$cfg[php_functions]);
require_once($Raiz[local].$cfg[php_mysql]);
require_once($Raiz[local].$cfg[php_tpl]);
require_once($Raiz[local].$cfg[path_php].'inc.constructHtml.php');
// Parsea parámetros obtenidos por URL y los pone en arrays: $in[] y $ins[]
parseFormSanitizer($_GET, $_POST); # $ins[]
parseForm($_GET, $_POST); # $in[]
// Diccionario de idioma
$idioma = (!isset($_SESSION[idioma]))?strtoupper($cfg[idioma]):strtoupper($_SESSION[idioma]);
if($idioma=='EN'){
	$dicFile = $cfg[path_dic_en];
}else{
	$dicFile = $cfg[path_dic_es];
}
diccionario($Raiz[local].$dicFile);
/*O3M*/
?>