@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='chat'@stop

@section('content')

<section class="mensaje-seccion">	
	<div class="titulo-chat">
		<a href="{{ route($destinatario->user->tipo, [$destinatario->slug]) }}">
			<div class="info-chat">
				<div class="img-chat">
					<img src="{{ asset($destinatario->url_foto)  }}" class="img-chat-i">
				</div>
				<div class="info-chat-m">
					<span class="nombre-chat">{{{$destinatario->nombre}}}</span><br>
					<span class="correo-chat">{{{$destinatario->user->email}}}</span>
				</div>
			</div>
		</a>
	</div>
	<div class="max-container max-mensajes min">	
		<div id="barra-chat">
			<div class="contactos">
				<div class="contactos-container">
				<div class="titulo-s-chat">Estudiantes:</div>
					@forelse($usuarios->estudiantes as $e)
						@if($e->user->id != Auth::user()->id)
							<div class="elemento-u-chat @if($destinatario->slug == $e->slug) chat-activo @endif @if(tieneNoLeidos($e->user->mensajes) != 0) pendiente @endif" onclick="window.location='{{ route('mensajes', [$e->slug]) }}';">
								<div class="img-u-c-chat">
									<img src="{{ asset($e->url_foto) }}" class="img-u-chat">
								</div>
								<div class="info-u-chat">
									<a href="{{ route('estudiante', [$e->slug]) }}"><span class="nombre-u-chat">{{{$e->nombre_corto}}}</span></a>									
									<span class="email-u-chat">{{{$e->user->email}}}</span>
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
							<div class="elemento-u-chat @if($destinatario->slug == $em->slug) chat-activo @endif @if(tieneNoLeidos($em->user->mensajes) != 0) pendiente @endif" onclick="window.location='{{ route('mensajes', [$em->slug]) }}';">
								<div class="img-u-c-chat">
									<img src="{{ asset($em->url_foto) }}" class="img-u-chat">
								</div>
								<div class="info-u-chat">
									<a href="{{ route('empresa', [$em->slug]) }}"><span class="nombre-u-chat">{{{$em->nombre}}}</span></a>									
									<span class="email-u-chat">{{{$em->user->email}}}</span>
								</div>
							</div>
						@endif
					@empty
						<div class="elemento-u-chat">No hay contactos en esta sección</div>
					@endforelse
				</div>				
			</div>
		</div>
		<div class="seccion-mensajes">
			<div id="mensajes">
				@forelse($mensajes as $m)		
					<div class="contenedor-mensaje @if($m->remitente == $user->$tipou->slug) enviado @elseif($m->remitente == $destinatario->slug) recibido @endif">
						<div class="mensaje @if($m->remitente == $user->$tipou->slug) enviado @elseif($m->remitente == $destinatario->slug) recibido @endif">
							<span class="contenido-mensaje">{{{$m->contenido}}}</span>
						</div>
					</div>
				@empty
					<span class="contenido sin-info" id="sin-mensajes">No hay mensajes para mostrar</span>
				@endforelse
			</div>
			<div class="enviar-form">
				<input type="text" class="input-mensaje" id="input-mensaje" placeholder="Escribe tu mensaje">
				<button class="boton" id="btn-enviar-mensaje">Enviar</button>
			</div>
		</div>
	</div>
</section>

@stop

@section('custom-js')
<script>
	var destinatario = '{{ $destinatario->slug }}';
	var	url_mensajes = '{{ route("getMensajes") }}';
	var	url_enviar = '{{ route("enviarMensaje") }}';
</script>
<script src="{{ asset('js/chat.js') }}"></script>

@stop