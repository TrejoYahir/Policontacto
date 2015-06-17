@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-novedades">		
		<div class="contenido-novedades">
		@if(Auth::check())
			@if(isset(Auth::user()->estudiante->id) || isset(Auth::user()->empresa->id))
				<div class="publicaciones-n" id="publicaciones-n">
					@forelse($publicaciones as $publicacion)
						<span class="display-none">{{$tipou = $publicacion->user->tipo}}</span>
						<div class="publicacion-n">
							<div class="publicacion-header">
								<a href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
									<img src="{{ asset($publicacion->user->$tipou->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
								</a>
								<div class="info-publicacion">
									<a class="nombre-publicacion" href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
										@if(isset(Auth::user()->estudiante->id))
											{{{ $publicacion->user->$tipou->nombre  }}}
										@elseif(isset(Auth::user()->empresa->id))
											{{{ $publicacion->user->$tipou->nombre }}}
										@endif
									</a><br>
									<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
									<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
								</div>							
							</div>						
							<div class="contenido-publicacion">{{ $publicacion->contenido }}</div>
						</div>
					@empty
					    <p class="sin-info">Aún no hay nada que mostrar</p>
					@endforelse
				</div>
			@else
				<p class="sin-info">No hay nada que mostrar</p>
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