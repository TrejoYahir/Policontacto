$(document).ready(function() {

	var publicaciones = $( '#publicaciones-n' );

	publicaciones.masonry( {
		columnWidth: '.publicacion-n',
		itemSelector: '.publicacion-n'
	} );

});