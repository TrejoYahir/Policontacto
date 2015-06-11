@extends('layout')

@section('body-class')class='perfil-estudiante'@stop

@section('content')

<div class="titulo-area">
	<span class="nombre-area">{{$area->nombre}}</span>
</div>
<section class="perfil-seccion">
	<div class="max-container max-areas">		
		<div class="contenido-novedades">
			<div class="lista-usuarios">
				<div class="titulo-lista u-elemento">Estudiantes</div>
				@forelse($area->estudiantes as $estudiante)
					<div class="u-elemento" onclick="window.location='{{ route('estudiante', [$estudiante->slug]) }}';">
						<div class="info-elemento">
							<div class="img-elemento">
								<img src="{{ asset($estudiante->url_foto)  }}" class="img-i-elemento">
							</div>
							<div class="info-elemento-t">
								<span class="nombre-elemento">{{$estudiante->nombre . ' ' . $estudiante->apellidos}}</span>
								<span class="correo-elemento">{{$estudiante->user->email}}</span>
							</div>
						</div>
					</div>
				@empty
				    <p class="sin-info">No hay estudiantes registrados en esta área.</p>
				@endforelse
			</div>
			<div class="lista-usuarios">
				<div class="u-elemento titulo-lista">Empresas</div>
				@forelse($area->empresas as $empresa)
					<div class="u-elemento" onclick="window.location='{{ route('empresa', [$empresa->slug]) }}';">
						<div class="info-elemento">
							<div class="img-elemento">
								<img src="{{ asset($empresa->url_foto)  }}" class="img-i-elemento">
							</div>
							<div class="info-elemento-t">
								<span class="nombre-elemento">{{$empresa->nombre }}</span>
								<span class="correo-elemento">{{$empresa->user->email}}</span>
							</div>
						</div>
					</div>
				@empty
				    <p class="sin-info">No hay empresas registradas en esta área.</p>
				@endforelse
			</div>
		</div>
	</div>
</section>

@stop