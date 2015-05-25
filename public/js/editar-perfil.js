var selector = $('.boton-seleccion').first();

$(function() {
	if($(selector).hasClass('hay-foto'))
	{
		var fondo = $(selector).data('fondo');
		$( "#simbolo-upload" ).toggle(300, 'linear');
		$( "#texto-imagen-s" ).toggle(100, 'linear');
		$(selector).css({'background': 'url(../'+fondo+') center center no-repeat', 'background-size':'cover'});
		$( "#simbolo-upload" ).addClass('toggled');
	}
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();						
		
		reader.onload = function (e) {
			$(selector).css({'background': 'url('+e.target.result+') center center no-repeat', 'background-size':'cover'});
			if(!($("#simbolo-upload").hasClass("toggled")))
			{
				$( "#simbolo-upload" ).toggle(300, 'linear');									
				$( "#simbolo-upload" ).addClass('toggled');
			}
		}
		
		reader.readAsDataURL(input.files[0]);
	}
}

$("#imgInp").change(function(){
	readURL(this);
});

	
$(".upload").hover(
	function() {
		if($( "#simbolo-upload" ).hasClass('toggled')){		
			$( "#simbolo-upload" ).toggle(300, 'linear');
		}
	}, 
	function() {
			if($( "#simbolo-upload" ).hasClass('toggled')){
				$( "#simbolo-upload" ).toggle(300, 'linear');
			}
});

