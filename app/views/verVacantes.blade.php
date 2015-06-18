@extends('layout')

@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-areas">		
		<div class="contenido-novedades">
			<div class="lista-vacantes">
				<div class="titulo-vacantes u-elemento-v">Vacantes en <a href="{{ route('empresa', [$empresa->slug]) }}" class="link-vacante">{{{$empresa->nombre}}}</a></div>
				@forelse($empresa->vacantes as $vacante)
					<div class="u-elemento-v" data-id="{{$vacante->id}}">
						<div class="info-elemento">
							<div class="info-elemento-t">
								<span class="nombre-elemento">{{{$vacante->nombre}}}</span>
								<span class="correo-elemento">{{{$vacante->descripcion}}}</span>
							</div>
						</div>
					</div>
				@empty
						<p class="sin-info s-i-v">Esta empresa no tiene vacantes disponibles.</p>
				@endforelse
			</div>
		</div>
	</div>	
</section>

@stop