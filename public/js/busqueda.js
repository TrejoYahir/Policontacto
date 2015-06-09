$(document).ready(function() {

var buscar = $("#buscar");
var res = $("#resultados");

function upp () {

		var keywords = $('#buscar').val();
		if(keywords.length>0){
			$.ajax({
				type: 'GET',
				url: url_ruta_buscar,
				data: {keywords: keywords},
				success: function (data) {
					if(buscar.focus()){
						$('#resultados').show();
					}
					$('#resultados').html(data);
				},
				error: function(errors){
					console.log("error: ");
					console.log(errors);
				}
			});
		}
		else
		{
			$('#resultados').hide();
		}

}

/*buscar.blur(function(){
	$('#resultados').hide();
});*/

$(document).mouseup(function (e)
{

    if (!res.is(e.target) && res.has(e.target).length === 0)
    {
    	if (!buscar.is(e.target) && buscar.has(e.target).length === 0)
    	{
        res.hide();
    	}
    }
});

buscar.focus(function(){
	$('#resultados').show();
});


buscar.keyup(upp);

});