@extends('layout')

@section('body-class')class='missing-body'@stop

@section('content')

<section>
	<div class="missing-contenido">		
		<div class="icono-perdido">¯\_(ツ)_/¯</div>
		<div class="texto-perdido">Lo sentimos, no encontramos lo que estás buscando</div>
		<a href="{{ route('home') }}" class="regresar-inicio">Regresar al inicio</a>
	</div>
</section>

@stop