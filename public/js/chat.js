$(document).ready(function() {


	var	mensaje = $('#input-mensaje'),
		mensajes = $("#mensajes"),
		sin_mensajes = $("#sin-mensajes"),
		btn_mensaje = $("#btn-enviar-mensaje");

	(function poll(){
		$.ajax({ 
			url: url_mensajes,
			type: 'POST',
			data: {remitente:destinatario},
			success: function(data){
				console.log(data);
				getMensajes(data);
			}, 
			complete: poll,
			timeout: 30000 
		});
	})();

	
	$(document).keyup(function(e) {
		if (e.keyCode == 13)
			enviarMensaje();
	});

	btn_mensaje.click(enviarMensaje);

	function getMensajes(data)
	{
		console.log("esperando");
		if (data.length > 0){
			if(sin_mensajes.is(":visible")) sin_mensajes.hide();
			mensajes.append('<div class="contenedor-mensaje recibido"><div class="mensaje recibido"><span class="contenido-mensaje">'+data+'</span></div></div>');
		}
	}

	function enviarMensaje()
	{
		$.post(url_enviar, {destinatario: destinatario, contenido: mensaje.val()}, function(data)
		{
			if(sin_mensajes.is(":visible")) sin_mensajes.hide();
			mensajes.append('<div class="contenedor-mensaje enviado"><div class="mensaje enviado"><span class="contenido-mensaje">'+mensaje.val()+'</span></div></div>');
			mensaje.val('');
			console.log("completo");
			console.log(data);
		});
	}



});