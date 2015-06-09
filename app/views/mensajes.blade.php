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
					<span class="nombre-chat">{{$destinatario->nombre}}</span><br>
					<span class="correo-chat">{{$destinatario->user->email}}</span>
				</div>
			</div>
		</a>
	</div>
	<div class="max-container max-mensajes min">	
		<div id="barra-chat">
			
		</div>
		<div class="seccion-mensajes">
			<div id="mensajes">
				@forelse($mensajes as $m)		
					<div class="contenedor-mensaje @if($m->remitente == $user->$tipou->slug) enviado @elseif($m->remitente == $destinatario->slug) recibido @endif">
						<div class="mensaje @if($m->remitente == $user->$tipou->slug) enviado @elseif($m->remitente == $destinatario->slug) recibido @endif">
							<span class="contenido-mensaje">	{{$m->contenido}} </span>
						</div>
					</div>
				@empty
					<span class="contenido sin-info">No hay mensajes para mostrar</span>
				@endforelse
			</div>
			<div class="enviar-form">
				<input type="text" class="input-mensaje" id="input-mensaje">
				<button class="boton">Enviar</button>
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