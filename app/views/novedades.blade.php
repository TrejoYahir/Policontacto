@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='perfil-estudiante'@stop

@section('content')


<section class="perfil-seccion">
	<div class="max-container max-novedades">
		<div class="ordenar">
			<a href="/" class="ordenar-por @if(Request::get('ordenar') == null) link-activo @endif"><span class="bullet-container"><i class="fa fa-circle"></i></span> Mostrar todo</a>
			<a href="?ordenar=estudiante" class="ordenar-por @if(Request::get('ordenar') == 'estudiante') link-activo @endif"><span class="bullet-container"><i class="fa fa-circle"></i></span> Solo de estudiantes</a>
			<a href="?ordenar=empresa" class="ordenar-por @if(Request::get('ordenar') == 'empresa') link-activo @endif"><span class="bullet-container"><i class="fa fa-circle"></i></span> Solo de empresas</a>
			<a href="?ordenar=vacante" class="ordenar-por @if(Request::get('ordenar') == 'vacante') link-activo @endif"><span class="bullet-container"><i class="fa fa-circle"></i></span> Solo vacantes</a>
		</div>
		<span class="display-none">{{{$tipox = Auth::user()->tipo}}}</span>		
		<div class="contenido-novedades">
		@if(Auth::check())
			@if(isset(Auth::user()->estudiante->id) || isset(Auth::user()->empresa->id))
				<div class="publicaciones-n" id="publicaciones-n">
					@forelse($publicaciones as $publicacion)
					<span class="display-none">{{{$tipou = $publicacion->user->tipo}}}</span>
					@if($publicacion->user->$tipou->area_id == Auth::user()->$tipox->area_id)
						@if($publicacion->tipo == "estudiante" && $tipou == "estudiante")


							<div class="publicacion-n">
								<div class="publicacion-header">
									<a href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
										<img src="{{ asset($publicacion->user->$tipou->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
									</a>
									<div class="info-publicacion">
										<a class="nombre-publicacion" href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
											{{{ $publicacion->user->$tipou->nombre_corto  }}}
										</a><br>
										<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
										<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
									</div>							
								</div>						
								<div class="contenido-publicacion">{{{ $publicacion->contenido }}}</div>
							</div>


						@elseif($publicacion->tipo == "empresa" && $tipou == "empresa")


							<div class="publicacion-n p-empresa">
								<div class="publicacion-header">
									<a href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
										<img src="{{ asset($publicacion->user->$tipou->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
									</a>
									<div class="info-publicacion">
										<a class="nombre-publicacion nombre-p-empresa" href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
												{{{ $publicacion->user->$tipou->nombre  }}}
										</a><br>
										<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
										<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
									</div>							
								</div>						
								<div class="contenido-publicacion contenido-e">{{{ $publicacion->contenido }}}</div>
							</div>


						@elseif($publicacion->tipo == "vacante" && $tipou == "empresa")


							<div class="publicacion-n publicacion-vacante p-empresa">
								<div class="publicacion-header">
									<a href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
										<img src="{{ asset($publicacion->user->$tipou->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
									</a>
									<div class="info-publicacion info-e">
										<a class="nombre-publicacion nombre-p-empresa" href="{{ route($tipou, [$publicacion->user->$tipou->slug]) }}">
												{{{ $publicacion->user->$tipou->nombre  }}}
										</a><br>
										<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
										<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
									</div>							
									<span class="v-info">Vacante <i class="fa fa-circle"></i></span>
								</div>						
								<div class="contenido-publicacion contenido-e">
									<span class="c-pub-vacante">										
										<strong>{{{ $publicacion->contenido }}}</strong>
									</span>
									<a href="{{ route('verVacantes', [$publicacion->user->$tipou->slug]) }}" class="link-vacante-p"> <i class="fa fa-eye"></i> Ver las otras vacantes</a>
								</div>
							</div>


						@endif
					@endif
					@empty
					    <p class="sin-info">Aún no hay nada que mostrar</p>
					@endforelse
				</div>
				<div>{{$publicaciones->appends(Request::only('ordenar'))->links()}}</div>
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