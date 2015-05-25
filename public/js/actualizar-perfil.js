
$(document).ready(function() {

	var datosObtenidos,
		publicacion = $('.publicacion').first();

	function setData(data)
	{
		if(!datosObtenidos)
			{
				datosObtenidos = data.publicaciones[0];

				if($(publicacion).length == 0 && data.publicaciones.length != 0)
				{
					console.log("true");
					return true;
				}
				else
				{
					console.log("false");					
					return false;
				}
				console.log(datosObtenidos);
			} 				
		else 
			{
				if(datosObtenidos['id'] == data.publicaciones[0]['id'])
				{
					console.log("false 2");
					console.log(datosObtenidos);
					return false;
				}
				else if(datosObtenidos['id'] != data.publicaciones[0]['id'])
				{
					console.log("true");
					console.log(datosObtenidos);
					datosObtenidos = data.publicaciones[0];
					console.log(datosObtenidos);
					return true;	
				}
			}
	}		

	function procesar(data)
	{
		if(setData(data))
		{
			anadirPost(data);
		}
	}	

	setInterval(function(){
		$.ajax({
			type: 'GET',
			url: url_ruta,
			success: function (data) {
				procesar(data);
			},
			error: function(errors){
				console.log("error: ");
				console.log(errors);
			}
		})
	},2000);
});