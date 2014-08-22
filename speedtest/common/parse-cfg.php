<?php /*O3M*/
/**
* Descripción:	Parsea archivo con datos de configuración incial y los
*				pone disponibles en variables globales.
* Creación:		2014-04-25
* @author		Oscar Maldonado - O3M
* @param 		$filename
* @return 		$cfg[], $db[]
*/
function load_vars($filename='') {
#Load config information from config.ini file.		
	try {
		global $cfg, $db;
		if (file_exists($filename)) {
	        if ($handle = fopen($filename, 'r')) {
	        	$varsList = array('var','db');
	            while (!feof($handle)) {
	                list($type, $name, $value) = preg_split("/\||=/", fgets($handle), 3);                              
					if (trim($type)=='var') { 
					#CFG vars
						$cfg[trim($name)] = trim($value);
					}
					if ($cfg[db] && trim($type)=='db') { 
					#DB vars
						list($opt, $name) = preg_split("/\./", $name, 2);  
						$db[trim($opt)][trim($name)] = trim($value);					
					}				
					if (in_array(trim($type),$varsList)) { 
					#Print for Debug
						$opt = ($opt) ? $opt.' . ' : '';
					 	$val.=$type.' | '.$opt.$name.' = '.$value."<br/>\n\r";
					}
	            }
	            ## DB Conections Vars
				if($cfg[db]){
					switch (strtolower($cfg[db_engine])) {
						case 'mysql':
							$db[local][conn_std] = $db[local][host].','.$db[local][user].','.$db[local][pass];
							$db[local][conn_dbi] = $db[local][host].','.$db[local][user].','.$db[local][pass].','.$db[local][database];
							$db[local][conn_pdo] = 'mysql:host='.$db[local][host].';dbname='.$db[local][database].', '.$db[local][user].', '.$db[local][pass];
							$db[server][conn_std] = $db[server][host].','.$db[server][user].','.$db[server][pass];
							$db[server][conn_dbi] = $db[server][host].','.$db[server][user].','.$db[server][pass].','.$db[server][database];
							$db[server][conn_pdo] = 'mysql:host='.$db[server][host].';dbname='.$db[server][database].', '.$db[server][user].', '.$db[server][pass];
							break;	
						case 'postgres':
							break;
						case 'oracle':
							break;
						case 'mssql':
							break;					
						default:
							break;
					}					
				}
				##--DB end
	        }	        
			return $val;
		}else{
			$msj = "¡ERROR CRÍTICO!<br/> No se ha logrado cargar el archivo de configuración, por favor, contacte al administrador del sistema.<br/>";
	    	throw new Exception($msj, 1);    	
	    }	
	} catch (Exception $e) {		
		print($e->getMessage());
		return false;
	}	   
}
/*O3M*/
?>