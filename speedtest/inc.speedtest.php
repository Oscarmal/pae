<?php /*O3M*/
/*
*	Descripción:	Rutina para medir velocidad de descarga
*	Creación:		2014-08-19
*	@author:		Oscar Maldonado
*	Dependencias:	Requiere ejecutar un archivo externo alojado en el hosting(bytes.php)
*	Detalle:
*
*	Kilo-bytes per second = KB/s
*	Kilo-bits per second = kbps
*
*	1 kbps = 1000 bps (bits per second)
*	1 KB/s = 1024 B/s 
*	1 KB/s = 8.192 kbps
*	1 kbps = .1221 KB/s
*/

/*Main*/
$test = speedtest();
print_r($test);

/*Functions*/
date_default_timezone_set("America/Mexico_City");
header('Content-Type: text/html; charset=utf-8');
function speedtest($urlTest=0){
	// date_default_timezone_set("America/Mexico_City");
	// header('Content-Type: text/html; charset=utf-8');
	$data = array();
	#Tiempo de inicio
	set_time_limit(0);
	$tiempo_micro[1] = microtime();
	$q_espacios = explode(" ",$tiempo_micro[1]);
	$tiempo[1]= $q_espacios[1] + $q_espacios[0];
	#Ejecución de archivo externo
	if(!$urlTest){		
		$url = 'http://admincontrol.gcontempo.com:8080/IS_AdminControl/php/transacciones/speedtest/speedtest.php';
	}else{
		// $url = 'http://localhost/pruebas/speedtest/speedtest.php';
		$url = 'http://javcasta.com/utiles/BW/cargar_bytes.php';
	}	
	$contenido=file_get_contents($url);
	#Información obtenida
	$tamano_KB = strlen($contenido)/1024;
	$tamano_MB = $tamano_KB/1024;
	#Tiempo final
	$tiempo_micro[2] = microtime();
	$q_espacios = explode(" ",$tiempo_micro[2]);
	$tiempo[2] = $q_espacios[1] + $q_espacios[0];
	$tiempo_utilizado = number_format(($tiempo[2] - $tiempo[1]),3, "." ,",");
	#Formato a resultado
	$vel_bits = round($tamano_KB / $tiempo_utilizado,2);
	$vel_bytes = round($tamano_MB / $tiempo_utilizado,2);
	$vel_megabytes = $vel_bytes / 8;
	$data[sizeMB] = $tamano_MB;  		#File size MB
	$data[sizeKB] = $tamano_KB;  		#File size KB
	$data[time] = $tiempo_utilizado;  	#Seconds
	$data[kbps] = $vel_bits;			#Kilo Bits per second
	$data[mbps] = $vel_bytes;			#Mega Bits per second
	$data[MB] = $vel_megabytes;			#MegaBytes
	$data[url] = $url;					#URL
	$data[timestamp] = date('Y-m-d H:i:s');	#Timestamp
	$string = json_encode($data);
	if(savedata($data,$string)){
		return $string;
	}else{
		echo "Error al guardar información: ".$string;
	}
}

function savedata($data=array(),$string=''){
	require_once('common/inc.mysqli.php');
	$puntoventa = "prueba_".rand(1,999);
	$pais = "México";
	$ip = getIp();
	$browser = json_encode(getBrowser());
	$sql = "INSERT INTO speedtest SET 
				puntoventa='$puntoventa',
				pais='$pais',
				ip='$ip',
				kbps='$data[kbps]',
				mbps='$data[mbps]',
				segs='$data[time]',
				cadena='$string',
				navegador='$browser',
				timestamp='$data[timestamp]';";
	$sqlResult = (SQLDo($sql))?true:false;
	return $sqlResult;
}

function getIp() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		return $_SERVER['HTTP_CLIENT_IP'];		
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		return $_SERVER['HTTP_X_FORWARDED_FOR'];	
	}else{
		return $_SERVER['REMOTE_ADDR'];
	}
}

function getBrowser(){
	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");	
	// Valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER";
	$info['os'] = "OTHER";	
	// Navegador con su sistema operativo
	foreach($browser as $parent){
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s){
			$info['browser'] = $parent;
			$info['version'] = $version;
		}
	}	
	// Sistema operativo
	foreach($os as $val){
		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false){
			$info['os'] = $val;
		}
	}
	$info['agent'] = $_SERVER['HTTP_USER_AGENT'];
	return $info;
}
/*O3M*/
?>