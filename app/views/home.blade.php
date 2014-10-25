@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		<h2 class="texto-inicio">
			Nosotros te ayudamos a encontrar un lugar para hacer tu servicio social, encontrar empleo, mantenerte en contacto con otros estudiantes y alimentar tus conocimientos.
		</h2>
		{{ Form::open(['route' => 'registro', 'method' => 'POST', 'class' => 'form-registro', 'novalidate']) }}

			{{ Campo::text('nombre', null, ['class' => 'input-registro', 'required']) }}
			{{ Campo::text('apellidos', null, ['class' => 'input-registro', 'required']) }}
			{{ Campo::email('email', null, ['class' => 'input-registro', 'required']) }}
			<div class="select-form">
				<div class="form-inline">
					<span class="texto-form">Fecha de nacimiento</span><br/>
					{{ Form::selectRange('fecha_nacimiento[day]', 1, 31, null, ['class' => 'combo-registro']) }}
					{{ Form::selectRange('fecha_nacimiento[month]', 1, 12, null, ['class' => 'combo-registro']) }}
					{{ Form::selectYear('fecha_nacimiento[year]', date('Y') - 14, date('Y') - 80, null, ['class' => 'combo-registro']) }}
				</div>
				<div class="form-inline">
					<span class="texto-form">Género</span><br/>
					{{ Form::select('genero', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], null, ['class' => 'combo-genero']) }}
				</div>
			</div>
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
	</article>
</section>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>

@stop
