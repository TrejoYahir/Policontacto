$(document).ready(function() {

var form = $('.form-publicar');
	form.bind('submit',function (e) {
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			beforeSend: function(){
				console.log("antes");
				bloquearBoton();
			},
			complete: function(data){
				console.log("completo");
				afterPost(data);
			},
			done: function (data) {
				console.log("exito");
				obtenerPosts(data);
			},
			error: function(errors){
				console.log("error: ");
				console.log(errors)
			}
		});
   return false;
});
	

function obtenerPosts(){
	$.ajax({
		type: 'GET',
		url: url_ruta,
		beforeSend: function(){
			console.log("antes recibir");
		},
		success: function (data) {
			console.log("exito recibir");
			desbloquearBoton();
			anadirPost(data);  
		},
		error: function(errors){
			console.log("error recibir: ");
			console.log(errors)
		}
	})
}

function bloquearBoton(){
	var boton = $('.boton-compartir').first();
	$(boton).attr("disabled", true);
}

function desbloquearBoton(){
	var boton = $('.boton-compartir').first();
	$(form)[0].reset();
	$(boton).attr("disabled", false);
}

function afterPost(data)
{
	if(data.success == false){
		for(datos in data.errors){
			console.log("errores afterPost: ");
			console.log(data.errors[datos]);
		}
	}else{	    
		console.log("exito afterPost: ");
		console.log(data);
		obtenerPosts();
	}	
}


});