@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		{{ Form::model($user, ['route' => 'cambiarCuenta', 'method' => 'PUT', 'class' => 'form-registro', 'novalidate']) }}

			{{ Campo::email('email', null, ['class' => 'input-registro', 'required']) }}
			{{Campo::password('password',  ['class' => 'input-registro', 'required']) }}
			{{Campo::password('password_confirmation', ['class' => 'input-registro', 'required']) }}
			<button type="submit" class="boton-registro">Editar</button>

		{{ Form::close() }}
	</article>
</section>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>

@stop