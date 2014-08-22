<?php /*O3M*/
function load_vars($filename='') {
#Load config information from system.cfg file.
	global $sys, $cfg;	
	if (file_exists($filename)) {
        if ($handle = fopen($filename, 'r')) {
            while (!feof($handle)) {
                list($type, $name, $value) = preg_split("/\||=/", fgets($handle), 3);
				$value = utf8_encode(trim($value));
				if ($type == 'sys') {
					$sys[$name] = $value;
					$val.=$type.' | '.$name.' = '.$value."<br/>\n\r";
				} elseif ($type == 'conf' or $type == 'conf_local') { 
					$cfg[$name] = $value;
					$val.=$type.' | '.$name.' = '.$value."<br/>\n\r";
				}
            }
        }
		return $val;
    }	   
}
/*O3M*/
?>