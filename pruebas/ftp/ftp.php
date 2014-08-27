<?php
require_once('inc.ftp.php');
// ListFiles();
echo '<br>';
$archivo = 'nuevo-lijero.txt';
echo 'Intentando subir - '.date('Y-m-d H:i:s');
echo '<br>';
if(UploadFile($archivo,'nuevo-'.date('His').'.txt')){
	echo "SI se pudo";
	$resultado = true;
}else{
	echo "NO se subio archivo";
	$resultado = false;
}
echo '<br>';
echo 'Proceso terminado - '.date('Y-m-d H:i:s');
?>
