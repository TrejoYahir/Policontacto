@extends('layout')

@section('body-class')class='perfil'@stop

@section('content')
@if (Session::has('mensaje'))
	<div class='registro-exitoso mensaje-f'>
		<strong>{{ Session::get('mensaje') }}</strong>
	</div>
@endif
<section class="section-class">
	<article class="max-container">
		{{ Form::model($estudiante, ['route' => 'cambiarPerfil', 'method' => 'PUT', 'files' => true, 'class' => 'form-perfil']) }}
			<?php $array = array(null, null, null) ?>
			@if($estudiante->fecha)
				<?php $array = explode("-", $estudiante->fecha); ?>
			@endif	
			<div class="form-section">        
				{{ Campo::text('nombre', null, ['class' => 'input-registro', 'maxlength' => '30', 'required']) }}
				{{ Campo::text('apellidos', null, ['class' => 'input-registro','maxlength' => '50', 'required']) }}
				<div class="select-form">
					<div class="form-inline">
						<span class="texto-form">Fecha de nacimiento</span><br/>
						{{ Form::selectYear('fecha[year]', date('Y') - 14, date('Y') - 80, $array[0], ['class' => 'combo-registro']) }}
						{{ Form::selectRange('fecha[month]', 01, 12, $array[1], ['class' => 'combo-registro']) }}
						{{ Form::selectRange('fecha[day]', 01, 31, $array[2], ['class' => 'combo-registro']) }}					
					</div>
					<div class="form-inline">
						<span class="texto-form">Género</span><br/>
						{{ Form::select('genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'combo-genero']) }}
					</div>
					{{ $errors->first('fecha', '<span class="back-error">:message</span>') }}
				</div>
			 {{Form::textarea('descripcion', null, ['class' => 'input-registro','maxlength' => '2000', 'required', 'placeholder' => 'Descripción']) }}        
				<div class="select-form">
					<div class="form-inline">
						<span class="texto-form">Área</span><br/>
						{{ Form::select('area_id', $areas, null, ['class' => 'combo-perfil', 'id' => 'area_id']) }}
						<select id="plantel_id" name="plantel_id" class='combo-perfil'>
							<option>Seleccione un plantel</option>
							@if(isset(Auth::user()->estudiante->area_id))
								<option value='{{$estudiante->plantel_id}}' selected>{{$estudiante->plantel->nombre}}</option>
							@endif
						</select>
						<select id="especialidad_id" name="especialidad_id" class='combo-perfil'>
							<option>Seleccione una especialidad</option>
							@if(isset(Auth::user()->estudiante->area_id))
								<option value='{{$estudiante->especialidad_id}}' selected>{{$estudiante->especialidad->nombre}}</option>
							@endif
						</select>
					</div>
				</div>				
			</div>
			<div class="form-section align-center">
				<div class="boton-seleccion @if($estudiante->url_foto) hay-foto @endif" data-fondo={{$estudiante->url_foto}}>
					<div class="" id="simbolo-upload">+</div>
					{{ Form::file('url_foto', ['class' => 'input-registro upload','id' => 'imgInp']) }} 
				</div><br>
				<span class="texto-form" id="texto-imagen-s">Seleccione una imagen</span><br>
				{{ $errors->first('url_foto', '<span class="back-error foto-error">:message</span>') }}     
			</div><br>   
			<button type="submit" class="boton-guardar">Guardar</button>
		{{ Form::close() }}
	</article>
</section>

@stop

@section('custom-js')

<script src="{{ asset('js/editar-perfil.js') }}"></script>
<script>
	$(document).ready(function(){

		$('#area_id').change(function(){

			$.get("{{ route('dropdown') }}",

			{ opcion: $(this).val() },

			function(data) {

				$('#plantel_id').empty();

				$.each(data['planteles'], function(key, element) {
					$('#plantel_id').append("<option value='" + key + "'>" + element + "</option>");
				});

				$('#especialidad_id').empty();
				
				$.each(data['especialidades'], function(key, element) {
					$('#especialidad_id').append("<option value='" + key + "'>" + element + "</option>");
				});
			
			});
		});

	});		
</script>

@stop