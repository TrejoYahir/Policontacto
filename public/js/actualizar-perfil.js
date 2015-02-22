
$(document).ready(function() {

	var datosObtenidos;

	function setData(data)
	{
		if(!datosObtenidos)
			{
				datosObtenidos = data.publicaciones[0];
				return false;
			} 				
		else 
			{
				if(datosObtenidos['id'] == data.publicaciones[0]['id'])
				{
					return false;
				}
				else if(datosObtenidos['id'] != data.publicaciones[0]['id'])
				{
					datosObtenidos = data.publicaciones[0];
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