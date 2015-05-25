var buscar = $("#buscar");
var timer;

buscar.keydown(function(){
	clearTimeout(timer);
});

function upp () {
	timer = setTimeout(function(){

		var keywords = $('#buscar').val();
		if(keywords.length>0){
			$.ajax({
				type: 'GET',
				url: url_ruta,
				data: {keywords: keywords},
				success: function (data) {
					console.log(data);
				},
				error: function(errors){
					console.log("error: ");
					console.log(errors);
				}
			});
		}

	}, 10);
}

buscar.keyup(upp);
