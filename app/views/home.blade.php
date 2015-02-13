@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		<h2 class="texto-inicio">
			Nosotros te ayudamos a encontrar un lugar para hacer tu servicio social, encontrar empleo, mantenerte en contacto con otros estudiantes y alimentar tus conocimientos.
		</h2>
		@if(Auth::guest())
		{{ Form::open(['route' => 'registro', 'method' => 'POST', 'class' => 'form-registro']) }}

		{{--{{ Campo::text('nombre', null, ['class' => 'input-registro', 'required']) }}
			{{ Campo::text('apellidos', null, ['class' => 'input-registro', 'required']) }} --}}
			{{ Campo::email('email', null, ['class' => 'input-registro', 'required']) }}
		{{--<div class="select-form">
				<div class="form-inline">
					<span class="texto-form">Fecha de nacimiento</span><br/>
					{{ Form::selectRange('fecha[day]', 1, 31, null, ['class' => 'combo-registro']) }}
					{{ Form::selectRange('fecha[month]', 1, 12, null, ['class' => 'combo-registro']) }}
					{{ Form::selectYear('fecha[year]', date('Y') - 14, date('Y') - 80, null, ['class' => 'combo-registro']) }}
				</div>
				<div class="form-inline">
					<span class="texto-form">Género</span><br/>
					{{ Form::select('genero', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], null, ['class' => 'combo-genero']) }}
				</div>
			</div>--}}
			{{Campo::password('password',  ['class' => 'input-registro', 'required']) }}
			{{Campo::password('password_confirmation', ['class' => 'input-registro', 'required']) }}
			<div class="terms-container">
				{{ Form::checkbox('check', null, false, ['id' => 'check', 'required']) }}
				<label for="check">
					<span class="check"></span>
					<span class="box"></span>
					Acepto los <a href="" class="inicio">terminos y condiciones</a>
				</label>
			</div>
			{{ $errors->first('check', '<span class="back-error">:message</span>') }}
			<button type="submit" class="boton-registro">Registrarse</button>
			<p class="reg-empresa">o registrate como empresa <a href="" class="inicio">aquí</a></p>

		{{ Form::close() }}
		@endif
		@if(Auth::user())
			@if(isAdmin())
				<p>Eres admin, lol</p>
			@endif
		@endif
	</article>
</section>
<section class="home2">
	<article class="top-section">	
		<h2 class="titulo-seccion">¿Qué es Policontacto?</h2>
	</article>
</section>
<section class="home2">
	<article class="contenido special-bg">
		<div class="cont-container">			
			<div class="bloque-texto">
				Policontacto es un sistema que te provee una serie de herramientas útiles para facilitar trámites, buscar empleo, ampliar tus conocimientos y mantenerte conectado con personas de tu área profesional desde la comodidad de tu hogar.
			</div>
		</div>
	</article>
	<article class="top-section gris-c">	
		<h2 class="titulo-seccion gris">Aprovecha el poder de la web</h2>
	</article>
	<article class="contenido">
		<div class="bloque-informacion">
			<div class="icon-holder">			
				<span class="icon-bolt icono"></span>
			</div><br>
			<strong class="icono-title">
				Rápido y seguro
			</strong>
			<p class="icono-text">
				Policontacto está hecho de forma que tu navegación sea lo más rápida y segura posible, por lo que no tendrás que preocuparte por tus datos ya que están a salvo con nosotros.
			</p>
		</div>
		<div class="bloque-informacion">
			<div class="icon-holder">			
				<span class="icon-home icono"></span>
			</div><br>
			<strong class="icono-title">
				Desde la comodidad de tu hogar
			</strong>
			<p class="icono-text">
				Busca y encuentra lo que desees desde la comodidad de tu hogar, no más viajes en vano para pedir informes.
			</p>
		</div>
		<div class="bloque-informacion">
			<div class="icon-holder">			
				<span class="icon-desktop icono"></span>
			</div><br>
			<strong class="icono-title">
				Compatible con todos los dispositivos
			</strong>
			<p class="icono-text">
				Nuestro sistema está adaptado para que puedas accesar a él desde cualquier dispositivo sin ningún problema.
			</p>
		</div>
		<div class="bloque-informacion">
			<div class="icon-holder">			
				<span class="icon-web icono"></span>
			</div><br>
			<strong class="icono-title">
				Accesible desde cualquier lugar
			</strong>
			<p class="icono-text">
				Gracias a el poder de la web puedes accesar a nuestro sistema desde cualquier lugar a cualquier hora.
			</p>
		</div>
	</article>
</section>
<footer>
	<img src="{{ asset('img/CodeArtBlanco.png') }}" alt="" class="footer-logo"><p class="footer-text">©2015 CodeArt S.A. de C.V.</p>        
</footer>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>

@stop
