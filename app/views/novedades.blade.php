@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-novedades">		
		<div class="contenido-novedades">
		@if(Auth::check())
			@if(isset(Auth::user()->estudiante->nombre))
				<div class="publicaciones-n" id="publicaciones-n">
					@forelse($publicaciones as $publicacion)
						<div class="publicacion-n">
							<div class="publicacion-header">
								<a href="{{ route('estudiante', [$publicacion->user->estudiante->slug]) }}">
									<img src="{{ asset($publicacion->user->estudiante->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
								</a>
								<div class="info-publicacion">
									<a class="nombre-publicacion" href="{{ route('estudiante', [$publicacion->user->estudiante->slug]) }}">{{{ $publicacion->user->estudiante->nombre_corto  }}}</a><br>
									<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
									<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
								</div>							
							</div>						
							<div class="contenido-publicacion">{{ $publicacion->contenido }}</div>
						</div>
					@empty
					    <p class="sin-info">No hay nada que mostrar, contacta con tus amigos para seguir su actividad.</p>
					@endforelse
				</div>
			@else
				<span>No hay nada que mostrar</span>
			@endif
		@endif
		</div>
	</div>
</section>

@stop

@section('custom-js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>
<script src="{{ asset('js/home-layout.js') }}"></script>

@stop