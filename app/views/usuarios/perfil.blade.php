@extends('layout')

@section('body-class')class='perfil'@stop

@section('content')

<section class="section-class">
	<article class="max-container">
		{{ Form::model($estudiante, ['route' => 'cambiarPerfil', 'method' => 'PUT', 'files' => true, 'class' => 'form-registro', 'novalidate']) }}
			<?php $array = array(null, null, null) ?>
			@if($estudiante->fecha)
				<?php $array = explode("-", $estudiante->fecha); ?>
			@endif	
			<div class="form-section">        
				{{ Campo::text('nombre', null, ['class' => 'input-registro', 'required']) }}
				{{ Campo::text('apellidos', null, ['class' => 'input-registro', 'required']) }}
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
				</div>
			 {{Campo::textarea('curriculum', null, ['class' => 'input-registro', 'required']) }}        
				<div class="select-form">
					<div class="form-inline">
						<span class="texto-form">Área</span><br/>
						{{ Campo::select('area_id', $areas, null, ['class' => 'combo-perfil']) }}
						{{ Campo::select('plantel_id', $planteles, null, ['class' => 'combo-perfil']) }}
						{{ Campo::select('especialidad_id', $especialidades, null, ['class' => 'combo-perfil']) }}
				</div>
				</div>
				<div class="form-inline">          
					<span class="texto-form">Busco</span><br/>
					<div class="terms-container check-perfil">
						{{ Form::checkbox('serv', '1', false, ['id' => 'check']) }}
								<label for="check">
										<span class="check"></span>
										<span class="box"></span>
												Servicio Social
								</label>
					</div>
					<div class="terms-container2 check-perfil">
							{{ Form::checkbox('empleo', '1', false, ['id' => 'check2']) }}
							<label for="check2">
									<span class="check2"></span>
									<span class="box2"></span>
									Empleo
							</label>
					</div>       
				</div>
			</div>
			<div class="form-section">
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

@stop