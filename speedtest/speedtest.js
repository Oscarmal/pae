/*O3M*/
$(document).ready(function(){	
	speedtest();
});

function speedtest(){	
	var ajax_url = "inc.speedtest.php";
	$.ajax({
		type: 'POST',
		url: ajax_url,
		dataType: "json",
		data: {      
			auth : 1
		},
		beforeSend: function(){    
			txt = "Probando conexión...";
		    message = "<img src='common/wait.gif' valign='middle' align='center'>&nbsp "+txt;
		    showMessage(message, '#msj');   
		},
		success: function(data){ 
			var html = '';
			var col = false;
			var sizeKB = data.sizeKB;
			var sizeMB = data.sizeMB;
			var time = data.time;
			var kbps = data.kbps;
			var mbps = data.mbps;
			var MB = data.MB;
			var timestamp = data.timestamp;			
			// Imprime resultados
			$('#sizeKB').html(sizeKB);
			$('#sizeMB').html(sizeMB);
			$('#time').html(time);
			$('#kbps').html(kbps);
			$('#mbps').html(mbps);
			$('#MB').html(MB);
			
 			//KiloBits
 			for (var i=20; i>=1; i--){ 
				var val_Kb = i * 10; 
				var velocidad = (kbps>=800) ? 800 : kbps/2;
				if(kbps>=val_Kb && !col){
					html = '<div style="background-color:#F0F0F0; width:500px; float:left"><img width="' + velocidad + '" height="8" style="background-color: #FF0000" border="0"></div><strong>' + kbps + ' Su conexión</strong><br>';
					col = true;
				}else{
					html = '<div style="background-color:#F0F0F0; width:500px; float:left"><img width="' + (val_Kb/2) + '" height="8" style="background-color: #000099" border="0"></div>' + val_Kb + ' Kbps<br>';
				}
				$('#graphic-kbps').append(html);
			}

			//MegaBytes
			for(var i=6; i>=1; i--){
				var val_Mb = i*4;
				var val_MB = val_Mb/8;
				var velocidad = (mbps>=80) ? 80 : mbps/2;
				if(mbps>=val_Mb && !col){
					html = '<div style="background-color:#F0F0F0; width:500px; float:left"><img width="' + velocidad + '" height="8" style="background-color: #FF0000" border="0"></div><strong>' + mbps + ' - Su conexion</strong><br>';
					col = true;
				}else{
					html = '<div style="background-color:#F0F0F0; width:500px; float:left"><img width="' + (val_Mb/2) + '" height="8" style="background-color: #000099" border="0"></div>' + val_MB + ' MB<br>';
				}
				$('#graphic-mbps').append(html);
			}			
		},
		complete: function(){    
		    $('#msj').empty();
		    $("#speedtest").show(1000);

		}
    });
}

function showMessage(txt, id){
	$(id).show(1000);
    $(id).html(txt);
}
/*O3M*/