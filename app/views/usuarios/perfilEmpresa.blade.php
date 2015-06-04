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
		{{ Form::model($empresa, ['route' => 'cambiarPerfilEmpresa', 'method' => 'PUT', 'files' => true, 'class' => 'form-perfil']) }}
			<div class="form-section">        
			{{ Campo::text('nombre', null, ['class' => 'input-registro', 'maxlength' => '100', 'required']) }}
			{{ Campo::text('ubicacion', null, ['class' => 'input-registro', 'maxlength' => '100', 'required']) }}
			 {{Form::textarea('descripcion', null, ['class' => 'input-registro','maxlength' => '2000', 'required', 'placeholder' => 'Descripción']) }}        
				<div class="select-form">
					<div class="form-inline">
						<span class="texto-form">Área</span><br/>
						{{ Campo::select('area_id', $areas, null, ['class' => 'combo-perfil']) }}
					</div>
				</div>				
			</div>
			<div class="form-section align-center">
				<div class="boton-seleccion @if(isset($empresa->url_foto)) hay-foto @endif" data-fondo="@if(isset($empresa->url_foto)){{$empresa->url_foto}}@endif">
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