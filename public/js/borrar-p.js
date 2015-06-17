function borrarPublicacion(e, id) {
	$.ajax({
		url: url_borrar + id,
		type: 'DELETE',
		beforeSend: function() {
			$( publicaciones ).masonry( 'remove', e )
			$( publicaciones ).masonry( 'reloadItems' );
			$( publicaciones ).masonry( 'layout' );
		},
		success: function(data) {
			console.log(data);
		},
		error: function(errors){
			console.log("error recibir: ");
			console.log(errors)
		}

	});
}