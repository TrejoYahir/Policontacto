(function getMensajesCount(){
$.ajax({ 
		type: 'POST',
		url: url_mensajes_count,
		success: function(data){
			$("#mensajes-count").text(data);
		}, 
		complete: getMensajesCount,
		timeout: 30000 
	});
})();