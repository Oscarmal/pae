<?php
parseForm($_GET, $_POST);
function encrypt($input,$opt=false){
	global $cfg;
	$Key = $cfg[encrypt_key]; 
	if($opt){
		$output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($Key), $input, MCRYPT_MODE_CBC, md5(md5($Key))));
    	// $output = urlencode($output);
	}else{
		// $input = urldecode($input);
		$output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($Key))), "\0");
    }
	return ($output);	
}

function siExiste($texto, $txtmd5){
// Compara una cadena sin codificar contra una en MD5
	$encrypt = md5(encrypt($texto,1));
	$resultado = ($encrypt == $txtmd5)?true:false;
	return $resultado;
}

function enArray($valor,$array){
// Busca que exista el indice de un array y devuelve en nombre del indice
	foreach(array_keys($array) as $n){
		if(siExiste($n,$valor) && !$ok){
			$ok = true;
			$find = $n;
			break;
		}else{$find = false;}	
	}
	return $find;
}

function parseForm($g,$p){
#Load form information ($_GET/$_POST) into array $in[], $cmd[] without sanitizer
#ejem: parse_form($_GET, $_POST);
	global $in, $cmd;
	if(!empty($g)){
		$tvars = count($g);
		$vnames = array_keys($g);
		$vvalues = array_values($g);
	}elseif(!empty($p)){
		$tvars = count($p);
		$vnames = array_keys($p);
		$vvalues = array_values($p);
	}
	for($i=0;$i<$tvars;$i++){
		if($vnames[$i]=='cmd'){$cmd=$vvalues[$i];}
		$in[$vnames[$i]]=$vvalues[$i];
	}
}

#######
$cfg[encrypt_key] = 'Qwerty12345$.'; 
// $in[texto] = 'GENERAL';
$texto = trim($in[texto]);
$encrypt = (!empty($texto))?encrypt($texto,1):'';
$md5 = (!empty($encrypt))?md5($encrypt):'';
?>

<form id="fdatos" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" id="texto" name="texto"/>
	<input type="submit" value="codificar">
</form>
<?php 
echo 'Texto: '.$texto;
echo '<br>';
echo 'MD5: '.md5($texto);
echo '<hr>';
echo 'Encriptado: '.$encrypt;
echo '<br>';
echo 'MD5: '.$md5;
echo '<hr>';
echo 'Llave: '.$cfg[encrypt_key];
?>