$(document).ready(function()
{
	var form = $("#form-vacante"); 
	var cont = $("#form-cc");
	var clickerer = $("#llamar-form");
	var salir = $("#salir");

	$(document).mouseup(function(e)
	{		

		if(e.target.id != form.attr('id') && !form.has(e.target).length)
		{
				cont.fadeOut("fast");
		}
	});

	$(clickerer).click(function(){
		cont.css("display", "flex");
	});

	$(salir).click(function(){
		cont.fadeOut("fast");
	});

});

function borrarVacante(e, id) {
	$.ajax({
		url: 'eliminar/vacante/'+id,
		type: 'DELETE',
		beforeSend: function() {
			$(e).parent().fadeOut();
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