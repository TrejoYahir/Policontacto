$(document).ready(function() {

var publicaciones = $( '#publicaciones' );

publicaciones.masonry( {
    columnWidth: 93,
	  itemSelector: '.publicacion'
} );

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
            url: '../posts',
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

function anadirPost(data){
	var publicacionData = data.publicaciones[0];

	var contenido = publicacionData['contenido'],
		fecha = publicacionData['fecha'],
		publicaciones = $('#publicaciones'),
		publicacion = $('.publicacion').first(),
		nuevaPublicacion = publicacion.clone();

		nuevaPublicacion.find('.fecha-publicacion')
						.text(fecha);

		nuevaPublicacion.find('.contenido-publicacion')
						.text(contenido);		

		$( publicaciones ).prepend( nuevaPublicacion );
		$( publicaciones ).masonry( 'reloadItems' );
		$( publicaciones ).masonry( 'layout' );

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