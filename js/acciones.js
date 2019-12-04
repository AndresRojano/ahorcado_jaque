// JavaScript Document
$(document).ready(function(e) {
var abecedario=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		var encontradas=0;
		var oportunidades=6;
		var palabraoculta="";
		var palabraactual="";
		var temporal="";
		var posicionactual=0;
		var letraactual="";
var palabras=[];
	
	
	var colecciones=[];
	
	
	$('#btn-enviar').on('click',function(){
		$('#perdio_j').hide();
		$('#palabra_oculta').hide();
		obtenerpalabras($('#option_coleccion').val(), $('#option_cantidad').val());
    });
	

	function obtenerpalabras(coleccion, cuantas) {
 $.post("http://192.168.4.64/ahorcado/obtenerpalabras.php",{cual:coleccion, cuantas:cuantas},function(){				alert("Informacion enviada");
				alert("Coleccion: " + coleccion + " Numero de palabras: " + cuantas);
			})
			.done(function(datos){
alert (datos);
				palabras=JSON.parse(datos);
				console.log(palabras[0].textoPalabras); //se ejecuta cuando hay una respuesta

				$('#btnip').show();
				$('#opciones').hide();
				$('#selcoleccion').empty();
			})
			.fail(function(){
				alert("Error, No se pudo enviar la informacion.");
				
			});
	}
	
	
	
	
	function obtenercolecciones(textoip) {
		alert(textoip);
		//alert("http://" + textoip + "/ahorcado/obtenercolecciones.php");
		return $.post("http://" + textoip + "/ahorcado/obtenercolecciones.php", function(){
				
			});
	}
	$('#btn-buscar-colecciones').on('click',function(){
		$('#cargando').show();
		$.when(obtenercolecciones($('#textoip').val())).then(function successHandler(datos){
			var arreglo=JSON.parse(datos);
			for(var i=0; i<arreglo.length; i++){
				var option = new Option(arreglo[i].coleccion, arreglo[i].coleccion);
				$('#option_coleccion').append(option);
			}
			$('#btnip').hide();
			$('#option_coleccion').trigger("change");
			$('#cargando').hide();
			$('#opciones').show();
		},function errorHandler(){
			$('#cargando').hide();
			alert("Error no se encontro ninguna coleccion.");
			$('#btnip').show();
			
			
		});
		return false;
    });
	
	
	
	
	
	function inicializarvariables(){
		encontradas=0;
		oportunidades=6;
		temporal="";
		posicionactual=0;
		letraactual=0;
		palabraoculta=palabras[encontradas].textoPalabra;		

	    ocultarpalabra(palabraoculta);
		$('#imagen').attr('src','images/'+oportunidades+'.png');
		$('#palabra').text(palabraactual);
		$('#palabra_oculta').text(palabraoculta);
		$('#actual').text(abecedario[posicionactual]);
alert (palabraoculta);
	}
	
	
	//document.addEventListener("deviceready",function(){
		
		function ocultarpalabra (palabra) {
			palabraactual = "";
			for (x=0; x<palabra.length;x++)
			{
				if(abecedario.includes(palabra.charAt(x)))
				{
									 alert ("-"+palabraactual);

					palabraactual = palabraactual + "_";
				}
				else
				 {
					 palabraactual =palabraactual+ palabraoculta.charAt(x);
				 }

			}
			
		}
		
		$('#btn_comenzar').on('click',function(){
	inicializarvariables();
				$('#contenedor_imagen').show();
				$('#contenedor_letras').show();
				$('#palabra').show();
				$('#palabra_oculta').hide();
});
	$('#btnseleccionar').on('click', function(){
		
		$.when($.post("http://" + coleccion + "/ahorcado/obtenerpalabras.php",{cual:$('#txtIp').val(),cuantas:$('#txtdificultad').val()})).then(function Exito(datos){
			
			palabras = JSON.parse(datos);
		}, function Error(){
			
			alert("Error");
			
		});
		
		//palabras = JSON.parse(datos);
		
	});
	
	
	$('#siguiente').on('click',function(){
		if (posicionactual<26)
		{
			posicionactual=posicionactual+1;
			}
			else 
			{
				posicionactual=0;
			}
		$('#actual').text(abecedario[posicionactual]);
		
		});
		
		
		
		
		
	$('#anterior').on('click',function(){
		if (posicionactual>0)
		{
			posicionactual=posicionactual-1;
			}
			else 
			{
				posicionactual=26;
			}
		$('#actual').text(abecedario[posicionactual]);
		
		});
		
		$('#actual').on('click', function(){
		letraactual = $('#actual').html();
		temporal = "";
		for (var y=0; y<palabraoculta.length; y++)
		{
			if (abecedario.includes(palabraoculta.charAt(y)))
			{
				if (palabraoculta.charAt(y)==letraactual.charAt(0))
				{
					temporal = temporal + letraactual;
					//audio.play('acierto');
				}
				else
				{
					temporal = temporal + palabraactual.charAt(y);
				}
			}
			else
			{
				temporal = temporal + palabraoculta.charAt(y);
			}
		}
		
		$('#palabra').html(temporal);
		
		if (palabraactual != temporal) //acierto
		
		{
			palabraactual = temporal;
			if (palabraoculta == palabraactual)
			{
			encontrada = encontrada + 1;
			encontrada = $('#encontradas').html();
				//win
				
			}
		}
	
		else
		{
			oportunidades = oportunidades - 1;
			$('#imagen').attr('src','images/' + oportunidades + '.png');
			if (oportunidades<=0)
			{
				$('#contenedor_imagen').hide();
				$('#contenedor_letras').hide();
				$('#palabra').hide();
				$('#palabra_oculta').show();
				$('#perdio_j').show();
				//fin
			}
		}
	});
});//ready