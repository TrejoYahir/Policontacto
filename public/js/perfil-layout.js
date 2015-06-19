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
			tipo = publicacionData['tipo'];
			publicaciones = $('#publicaciones'),
			publicacion = $('.publicacion').first(),
			nuevaPublicacion = publicacion.clone();

			if($(publicacion).length == 0)
			{
				publicacion = crearPublicacionItem(tipo);
				nuevaPublicacion = $(publicacion).clone();
			}

			nuevaPublicacion.find('.fecha-publicacion')
							.text(fecha);

			if(tipo == "empresa" || tipo == "estudiante")
			{			
				nuevaPublicacion.find('.contenido-publicacion')
								.text(contenido);		
			}

			if(tipo == "vacante")
			{
				if(!nuevaPublicacion.has('.v-info'))
					nuevaPublicacion.html('<span class="v-info">Vacante <i class="fa fa-circle"></i></span>');

				nuevaPublicacion.find('.contenido-publicacion')
								.html('<span class="c-pub-vacante">'+contenido+'</span><a href="'+url_vacante+'" class="link-vacante-p"> <i class="fa fa-eye"></i> Ver las otras vacantes</a>');
			}

			if(tipo == "empresa")
			{
				nuevaPublicacion.find('.v-info')
								.hide();
			}

			$( publicaciones ).prepend( nuevaPublicacion );
			$( publicaciones ).masonry( 'reloadItems' );
			$( publicaciones ).masonry( 'layout' );

	}

	function crearPublicacionItem(tipo){
		var publicacionItem;
		if(tipo == 'estudiante')
		{
			publicacionItem = '<div class="publicacion"><div class="publicacion-header"><a href="'+url_estudiante+'"><img src="'+url_foto+'" alt="" class="img-avatar avatar-publicacion"></a><div class="info-publicacion"><a class="nombre-publicacion" href="'+url_estudiante+'">'+nombre+'</a><br><span class="email-publicacion">'+correo+'</span><br><span class="fecha-publicacion"></span></div></div><div class="contenido-publicacion"></div></div>';
			
		}
		else if(tipo == 'empresa')
		{
			publicacionItem = '<div class="publicacion p-empresa"><div class="publicacion-header"><a href="'+url_estudiante+'"><img src="'+url_foto+'" alt="" class="img-avatar avatar-publicacion"></a><div class="info-publicacion"><a class="nombre-publicacion nombre-p-empresa" href="'+url_estudiante+'">'+nombre+'</a><br><span class="email-publicacion">'+correo+'</span><br><span class="fecha-publicacion"></span></div></div><div class="contenido-publicacion contenido-e"></div></div>'
		}
		else if(tipo == 'vacante')
		{
			publicacionItem = '<div class="publicacion publicacion-vacante p-empresa"><div class="publicacion-header"><a href="'+url_estudiante+'"><img src="'+url_foto+'" alt="" class="img-avatar avatar-publicacion"></a><div class="info-publicacion info-e"><a class="nombre-publicacion nombre-p-empresa" href="'+url_estudiante+'">'+nombre+'</a><br><span class="email-publicacion">'+correo+'</span><br><span class="fecha-publicacion"></span></div><span class="v-info">Vacante <i class="fa fa-circle"></i></span></div><div class="contenido-publicacion contenido-e"></div></div>'
		}
		return publicacionItem;
	}