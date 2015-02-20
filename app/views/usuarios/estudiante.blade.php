@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-perfil">
		<div class="contenedor-absoluto">
			<div class="contenedor-relativo">		
				<div class="info-container">
					<div class="info-section">
						<figure class="img-container">
							<img src="{{ asset($estudiante->url_foto)  }}" class="img-perfil">			
						</figure>
					</div>
					<div class="info-section">
						<span class="info-perfil nombre-perfil"><strong>{{ $estudiante->nombre  }} {{ $estudiante->apellidos  }}</strong></span><br>
						<span class="info-perfil correo-perfil">{{ $estudiante->user->email  }}</span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil"><a href="{{ route('area', [$estudiante->area->slug, $estudiante->area->id]) }}">{{ $estudiante->area->nombre  }}</a></span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil align-left">{{ $estudiante->curriculum  }}</span><br>
					</div>		
				</div>
			</div>		
		</div>
		<div class="contenido-perfil">
			@if($estudiante->user == Auth::user())
			<div class="compartir-form">
				{{ Form::open(['route' => 'publicar', 'method' => 'POST', 'class' => 'form-publicar']) }}
					{{ Form::textarea('contenido', null, ['class' => 'textarea-compartir','maxlength' => '500', 'required']) }}
					{{ $errors->first('check', '<span class="back-error">:message</span>') }}
					<button type="submit" class="boton-compartir">Compartir</button>
				{{ Form::close() }}
			</div>
			@endif
			<div class="publicaciones" id="publicaciones">
				@foreach ($estudiante->user->publicaciones as $publicacion)
					<div class="publicacion">
						<div class="publicacion-header">
							<a href="{{ route('estudiante', [$estudiante->slug, $estudiante->id]) }}"><img src="{{ asset($estudiante->url_foto) }}" alt="" class="img-avatar avatar-publicacion"></a>
							<div class="info-publicacion">
								<a class="nombre-publicacion" href="{{ route('estudiante', [$estudiante->slug, $estudiante->id]) }}">{{ $estudiante->nombre_corto  }}</a><br>
								<span class="email-publicacion">{{ $estudiante->user->email }}</span><br>
								<span class="fecha-publicacion">{{ $publicacion->fecha }}</span>
							</div>							
						</div>						
						<div class="contenido-publicacion">{{ $publicacion->contenido }}</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

@stop

@section('custom-js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>
<script src="{{ asset('js/perfil-estudiante.js') }}"></script>

@stop