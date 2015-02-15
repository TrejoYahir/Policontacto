@extends('layout')

@section('content')

<section class="perfil">	
	<div class="info-container">
		<figure class="img-container">
			<img src="{{ $estudiante->user->url_foto  }}" class="img-perfil">			
		</figure>
		<p class="info-perfil nombre-perfil"><strong>{{ $estudiante->nombre  }} {{ $estudiante->apellidos  }}</strong></p>
		<p class="info-perfil">{{ $estudiante->user->email  }}</p>
		<p class="info-perfil"><a href="{{ route('area', [$estudiante->area->slug]) }}">{{ $estudiante->area->nombre  }}</a></p>
	</div>
</section>

@stop