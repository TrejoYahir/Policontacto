@extends('layout')

@section('content')

<section class="perfil-seccion">	
	<div class="info-container">
		<figure class="img-container">
			<img src="../{{ $estudiante->url_foto  }}" class="img-perfil">			
		</figure>
		<p class="info-perfil nombre-perfil"><strong>{{ $estudiante->nombre  }} {{ $estudiante->apellidos  }}</strong></p><br>
		<p class="info-perfil">{{ $estudiante->user->email  }}</p><br>
		<p class="info-perfil"><a href="{{ route('area', [$estudiante->area->slug, $estudiante->area->id]) }}">{{ $estudiante->area->nombre  }}</a></p><br>
	</div>
</section>

@stop