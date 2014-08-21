<?php 
/**
*   Conexión a PHP-MySQL usando MySQLi
*   @author Oscar Maldonado
*   O3M
*/
function SQLConn() {	
	require_once("conexion.php");
	$link = new mysqli($host,$user,$pass,$database);
	if ($link->connect_error) {
		echo "Error de Connexion ($link->connect_errno) $link->connect_error\n";
		// header('Location: error-conexion.php');
		exit;
	} else {
		return $link;
	}		
    $Result = 'ERROR: No puede conectarse con la base de datos';
    return $Result;
}

function SQLQuery($SQL){
//Ejecuta consultas de extracción
	$Cmd=array('SELECT');	
	$vSql=explode(' ',$SQL);
	if(in_array(strtoupper($vSql[0]),$Cmd)){
	    try{
	    	$db = SQLConn(); //Llama conexión
	    	$con = $db->query($SQL)or die(mysqli_connect_errno($db).' -> '.mysqli_connect_error()); //Ejecuta query	    	 	
	    	if(mysqli_num_rows($con)){
	    		$Result=mysqli_fetch_array($con);
	    	}else{$Result=null;}
	    	mysqli_close($db); //Cierra conexión	    	
	    	return $Result;
	    }catch(PDOException $e){
	    	echo "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
	    	echo $e->getMessage();
	    	return false;
	    }
	}
}

function SQLDo($SQL){
//Ejecuta consultas de modificación
	$SQL = utf8_decode($SQL);
	$Cmd=array('INSERT', 'UPDATE', 'DELETE');
	$vSql=explode(' ',$SQL);
	if(in_array(strtoupper($vSql[0]),$Cmd)){
	    try{
	    	$db = SQLConn(); //Llama conexión
	    	$con = $db->query($SQL)or die(mysqli_connect_errno($db).' -> '.mysqli_connect_error()); //Ejecuta query	    	 			    	
	    	mysqli_close($db); //Cierra conexión
	    	return true;
	    }catch(PDOException $e){
	    	echo "ERROR: La consulta SQL esta vacía o tiene errores: ".$SQL;
	    	return false;
	    }
	}else{
		echo "ERROR: La consulta es erronea.";
		return false;
	}
}
/*O3M*/
?>