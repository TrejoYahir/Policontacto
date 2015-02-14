@extends('layout')

@section('content')

<section class="perfil">	
	<div class="info-container">
		<figure class="img-container">
			<img src="{{ $empresa->user->url_foto  }}" class="img-perfil">			
		</figure>
		<p class="info-perfil nombre-perfil"><strong>{{ $empresa->nombre }}</strong></p>
		<p class="info-perfil">{{ $empresa->user->email }}</p>
		<p class="info-perfil"><a href="{{ route('area', [$empresa->area->slug]) }}">{{ $empresa->area->nombre }}</a></p>
	</div>
</section>

@stop