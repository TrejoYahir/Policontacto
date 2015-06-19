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
							<img src="{{ asset($empresa->url_foto)  }}" class="img-perfil">			
						</figure>
					</div>
					<div class="info-section">
						<span class="info-perfil nombre-perfil"><strong>{{{ $empresa->nombre  }}}</strong></span><br>
						<span class="info-perfil correo-perfil">{{{ $empresa->user->email  }}}</span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil"><a href="{{ route('verVacantes', [$empresa->slug]) }}">Ver empleos disponibles en esta empresa.</a></span><br>
					</div>	
					<div class="info-section">
						<span class="info-perfil"><a href="{{ route('area', [$empresa->area->slug]) }}">{{{ $empresa->area->nombre }}}</a></span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil">{{{ $empresa->ubicacion  }}}</span><br>
					</div>	
					<div class="info-section">
						<span class="info-perfil">{{{ $empresa->descripcion  }}}</span><br>
					</div>		
				</div>
			</div>		
		</div>
		<div class="contenido-perfil">
			@if($empresa->user->id == Auth::user()->id)
			<div class="compartir-form">
				{{ Form::open(['route' => 'publicar', 'method' => 'POST', 'class' => 'form-publicar', 'id' => 'form-publicar']) }}
					{{ Form::textarea('contenido', null, ['class' => 'textarea-compartir','maxlength' => '500', 'placeholder' => 'Comparte algo con los demás...', 'required']) }}
					{{ $errors->first('check', '<span class="back-error">:message</span>') }}
					<button type="submit" class="boton-compartir">Compartir</button>
				{{ Form::close() }}
			</div>
			@endif
			<div class="publicaciones" id="publicaciones">
				@foreach ($empresa->user->publicaciones as $publicacion)
					@if($publicacion->tipo == "empresa")

						<div class="publicacion p-empresa">
							<div class="publicacion-header">
								<a href="{{ route('empresa', [$publicacion->user->empresa->slug]) }}">
									<img src="{{ asset($publicacion->user->empresa->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
								</a>
								<div class="info-publicacion">
									<a class="nombre-publicacion nombre-p-empresa" href="{{ route('empresa', [$publicacion->user->empresa->slug]) }}">
											{{{ $publicacion->user->empresa->nombre  }}}
									</a><br>
									<span class="email-publicacion">{{{ $publicacion->user->email }}}</span><br>
									<span class="fecha-publicacion">{{{ $publicacion->fecha_p }}}</span>
								</div>							
							</div>						
							<div class="contenido-publicacion contenido-e">{{{ $publicacion->contenido }}}</div>
						</div>

					@elseif($publicacion->tipo == "vacante")

						<div class="publicacion publicacion-vacante p-empresa">
							<div class="publicacion-header">
								<a href="{{ route('empresa', [$publicacion->user->empresa->slug]) }}">
									<img src="{{ asset($publicacion->user->empresa->url_foto) }}" alt="" class="img-avatar avatar-publicacion">
								</a>
								<div class="info-publicacion info-e">
									<a class="nombre-publicacion nombre-p-empresa" href="{{ route('empresa', [$publicacion->user->empresa->slug]) }}">
											{{{ $publicacion->user->empresa->nombre  }}}
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
								<a href="{{ route('verVacantes', [$publicacion->user->empresa->slug]) }}" class="link-vacante-p"> <i class="fa fa-eye"></i> Ver las otras vacantes</a>
							</div>
						</div>

					@endif
				@endforeach
			</div>
		</div>
	</div>
</section>

@stop

@section('custom-js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>
<script>
    var nombre = "{{ $empresa->nombre }}",
    	correo = "{{ $empresa->user->email }}",
    	url_foto = "{{ asset($empresa->url_foto) }}",
    	url_empresa = "{{ route('empresa', [$empresa->slug]) }}";
    	url_estudiante = "{{ route('empresa', [$empresa->slug]) }}";
    	url_vacante = "{{ route('verVacantes', [$empresa->slug]) }}";

    	@if($empresa->user->id == Auth::user()->id)
			var	url_ruta = '{{ route("obtenerPublicaciones") }}';
		@elseif($empresa->user->id != Auth::user()->id)
			var	url_ruta = '{{ route("obtenerPublicacionesExternas", [$empresa->user->id]) }}';
		@endif

</script>

<script src="{{ asset('js/perfil-layout.js') }}"></script>

@if($empresa->user->id == Auth::user()->id)
	<script src="{{ asset('js/publicar-perfil.js') }}"></script>
@elseif($empresa->user->id != Auth::user()->id)	
	<script src="{{ asset('js/actualizar-perfil.js') }}"></script>
@endif

@stop