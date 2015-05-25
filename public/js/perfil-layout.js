$(document).ready(function() {

	var publicaciones = $( '#publicaciones' );

	publicaciones.masonry( {
		columnWidth: '.publicacion',
		itemSelector: '.publicacion'
	} );

});

function anadirPost(data){
		var publicacionData = data.publicaciones[0];

		var contenido = publicacionData['contenido'],
			fecha = publicacionData['fecha_p'],
			publicaciones = $('#publicaciones'),
			publicacion = $('.publicacion').first(),
			nuevaPublicacion = publicacion.clone();
			if($(publicacion).length == 0)
			{
				publicacion = crearPublicacionItem();
				nuevaPublicacion = $(publicacion).clone();
			}

		nuevaPublicacion.find('.fecha-publicacion')
						.text(fecha);

		nuevaPublicacion.find('.contenido-publicacion')
						.text(contenido);		

		$( publicaciones ).prepend( nuevaPublicacion );
		$( publicaciones ).masonry( 'reloadItems' );
		$( publicaciones ).masonry( 'layout' );

	}

	function crearPublicacionItem(){
		var publicacionItem = '<div class="publicacion"><div class="publicacion-header"><a href="'+url_estudiante+'"><img src="'+url_foto+'" alt="" class="img-avatar avatar-publicacion"></a><div class="info-publicacion"><a class="nombre-publicacion" href="'+url_estudiante+'">'+nombre+'</a><br><span class="email-publicacion">'+correo+'</span><br><span class="fecha-publicacion"></span></div></div><div class="contenido-publicacion"></div></div>';

		return publicacionItem;
	}