@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		{{ Form::model($user, ['route' => 'cambiarCuenta', 'method' => 'PUT', 'class' => 'form-registro']) }}

			{{Campo::email('email', null, ['class' => 'input-registro','maxlength' => '40', 'required']) }}
			{{Campo::password('password',  ['class' => 'input-registro','maxlength' => '30', 'required']) }}
			{{Campo::password('password_confirmation', ['class' => 'input-registro','maxlength' => '30', 'required']) }}
			<button type="submit" class="boton-registro">Editar</button>

		{{ Form::close() }}
	</article>
</section>

@stop