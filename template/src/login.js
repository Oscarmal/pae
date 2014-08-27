/*O3M*/
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

$(document).ready(function(){
	$("#b1").click(function() {
		modal0('ventana1');
	});
	$("#b2").click(function() {
		modal1('ventana2');
	});
	$("#b3").click(function() {
		modal2('ventana3');
	});
});
/*O3M*/