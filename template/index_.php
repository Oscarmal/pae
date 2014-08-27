<?php #session_name('o3m'); session_start(); include_once($_SESSION['header_path']);
require_once('common/php/inc.header.php');
session_destroy();
if($ins[txtUsuario] && $ins[txtClave]){
	// $auth = SQLQuery('select * from speedtest;');
	$_SESSION['usuario'] = 1;
	header('location: index2.php');
}
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<script type="text/javascript" src="common/js/jquery-1.9.1.min.js"></script>
	<script>
		function autentificar(){
			var usuario = $('#txtUsuario').val();
			var clave = $('#txtClave').val();
			if(usuario == ''){
				alert('Ingrese su Usuario');
				$("#txtUsuario").focus();
				return false;
			}
			if(clave == ''){
				alert('Ingrese su Clave');
				$("#txtClave").focus();
				return false;
			}
			$("#tblLogin").submit();
		}
	</script>
	</head>
	<body>
		<div id="tblLogin" style="top:30%; left:30%;">
			<table>
				<form id="frmLogin" method="post" action="<?php $_SERVER[php_self]; ?>">
				<thead><th colspan="2">Autentificación</th></thead>
				<tbody>
					<tr>
						<td>Usuario:</td>
						<td><input type="text" id="txtUsuario" name="txtUsuario" size="20" maxlength="20"/></td>
					</tr>
					<tr>
						<td>Clave:</td>
						<td><input type="password" id="txtClave" name="txtClave" size="20" maxlength="20"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="button" id="btnEntrar" name="btnEntrar" value=":: Entrar ::" onclick="autentificar()" /></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="2">Grupo Empresarial PAE</td>
					</tr>
				</tfoot>
				</form>
			</table>
		</div>
		<a href="index2.php">Entra</a>
	</body>
</html>