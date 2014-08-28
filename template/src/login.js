//O3M//
$(document).ready(function(){
	scriptJs_Enter(); //Carga detección de ENTER
});

function btnSubmit(){
	var usuario = $('#txtUsuario').val();
	var clave = $('#txtClave').val();
	var msj = '';
	if(usuario == ''){
		msj = 'Ingrese su Usuario, por favor...';
		popup('Usuario',msj,0,0,1,'txtUsuario');
		$("#txtUsuario").focus();
		return false;
	}
	if(clave == ''){
		msj = 'Ingrese su Clave, por favor...';
		popup('Clave',msj,0,0,1,'txtClave');
		$("#txtClave").focus();
		return false;
	}
	// $("#tblLogin").submit();
	login(usuario, clave);
}

function login(usuario, clave){	
	var raiz = raizPath();
	var ajax_url = raiz+"src/login.php";
	$.ajax({
		type: 'POST',
		url: ajax_url,
		dataType: "json",
		data: {      
			auth : 1,
			usuario : usuario,
			clave : clave
		},
		beforeSend: function(){    
			txt = "Validando credenciales, por favor espere...";
		    msj = "<img src='"+raiz+"common/img/wait.gif' valign='middle' align='center'>&nbsp "+txt;
		    popup('Autentificando',msj,0,0,3);  
		},
		success: function(respuesta){ 
			alert(respuesta);
			if(respuesta){
				// location.href = respuesta;
				alert(respuesta);
			}
		},
		complete: function(){    
		    $("#popups-alerts").empty();
		}
    });
}
//O3M//