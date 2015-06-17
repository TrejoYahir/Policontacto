@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='chat'@stop

@section('content')

<section class="mensaje-seccion">	
	<div class="max-container max-mensajes min">	
		<div id="barra-chat">
			<div class="contactos">
				<div class="contactos-container">
				<div class="titulo-s-chat">Estudiantes:</div>
					@forelse($usuarios->estudiantes as $e)
						@if($e->user->id != Auth::user()->id)
							<div class="elemento-u-chat @if(tieneNoLeidos($e->user->mensajes) !=  0) pendiente @endif" onclick="window.location='{{ route('mensajes', [$e->slug]) }}';">
								<div class="img-u-c-chat">
									<img src="{{ asset($e->url_foto) }}" class="img-u-chat">
								</div>
								<div class="info-u-chat">
									<a href="{{ route('estudiante', [$e->slug]) }}"><span class="nombre-u-chat">{{$e->nombre_corto}}</span></a>									
									<span class="email-u-chat">{{$e->user->email}}</span>
									@if(tieneNoLeidos($e->user->mensajes) !=  0)
										<i class="fa fa-circle bolita-indicadora"></i>
									@endif
								</div>
							</div>
						@endif
					@empty
						<div class="elemento-u-chat">No hay contactos en esta sección</div>
					@endforelse
				</div>
				<div class="contactos-container">
				<div class="titulo-s-chat">Empresas:</div>
					@forelse($usuarios->empresas as $em)
						@if($em->user->id != Auth::user()->id)
							<div class="elemento-u-chat @if(tieneNoLeidos($em->user->mensajes) != 0) pendiente @endif" onclick="window.location='{{ route('mensajes', [$em->slug]) }}';">
								<div class="img-u-c-chat">
									<img src="{{ asset($em->url_foto) }}" class="img-u-chat">
								</div>
								<div class="info-u-chat">
									<a href="{{ route('empresa', [$em->slug]) }}"><span class="nombre-u-chat">{{$em->nombre}}</span></a>									
									<span class="email-u-chat">{{$em->user->email}}</span>
									@if(tieneNoLeidos($em->user->mensajes) !=  0)
										<i class="fa fa-circle bolita-indicadora"></i>
									@endif
								</div>
							</div>
						@endif
					@empty
						<div class="elemento-u-chat">No hay contactos en esta sección</div>
					@endforelse
				</div>				
			</div>
		</div>
		<div class="seccion-mensajes m-vacio">
			<p class="sin-info">Por favor, selecciona un usuario para iniciar un chat.</p>
		</div>
	</div>
</section>

@stop