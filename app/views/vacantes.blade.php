@extends('layout')

@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-areas">		
		<div class="contenido-novedades">
			<div class="lista-vacantes">
				<div class="titulo-vacantes u-elemento-v">Vacantes <i class="fa fa-pencil-square-o icono-crear-v" id="llamar-form"></i></div>
				@forelse(Auth::user()->empresa->vacantes as $vacante)
					<div class="u-elemento-v" data-id="{{$vacante->id}}">
						<div class="info-elemento">
							<div class="info-elemento-t">
								<span class="nombre-elemento">{{$vacante->nombre}}</span>
								<span class="correo-elemento">{{$vacante->descripcion}}</span>
							</div>
						</div>
						<span class="btn-eliminar" onclick="borrarVacante(this, {{$vacante->id}})">
							<i class="fa fa-times"></i>
						</span>
					</div>
				@empty
						<p class="sin-info s-i-v">No has creado ninguna vacante.</p>
				@endforelse
			</div>
		</div>
	</div>	
</section>
<div class="form-container" id="form-cc">	
	{{ Form::open(['route' => 'guardarVacante', 'method' => 'POST', 'class' => 'form-vacante', 'id' => 'form-vacante']) }}
		<span class="salir"><i class="fa fa-times-circle-o" id="salir"></i></span>
		<div class="t-vacante-form">Ingresa los datos de la vacante</div>
		{{ Form::text('nombre', null, ['class' => 'input-vacante', 'required', 'placeholder' => 'Nombre de la vacante']) }}
		{{Form::textarea('descripcion', null, ['class' => 'textarea-vacante', 'required', 'placeholder' => 'Descripcion de la vacante']) }}
		<button type="submit" class="boton-vacante">Guardar vacante</button>
	{{ Form::close() }}
</div>

@stop

@section('custom-js')

<script>
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
</script>

@stop