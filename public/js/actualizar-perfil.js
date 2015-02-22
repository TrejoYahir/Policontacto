
$(document).ready(function() {

	var datosObtenidos;

	function setData(data)
	{
		if(!datosObtenidos)
			{
				datosObtenidos = data.publicaciones[0];
				if(datosObtenidos)
				{
					console.log("true 0");
					console.log(datosObtenidos);
					return true;
				}

				console.log("false");
				console.log(datosObtenidos);
				return false;
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
	},5000);
});