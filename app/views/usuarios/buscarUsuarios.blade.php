<div class="t-resultados">
	<span>Estudiantes encontrados:</span>
</div>
@forelse($estudiantes as $e)
	<a href="{{ route('estudiante', [$e->slug]) }}">
		<div class="resultado-i">
			<div class="div-img-r">
				<img src="{{ asset($e->url_foto)  }}" class="img-r">
			</div>
			<div class="info-r">
				<span class="nombre-r">{{$e->nombre}} {{$e->apellidos}}</span>
				<span class="correo-r">{{$e->user->email}}</span>
			</div>
		</div>
	</a>
@empty
	<span class="sin-resultados">
		No se encontraron resultados.
	</span>
@endforelse

<div class="t-resultados">
	<span>Empresas encontradas:</span>
</div>
@forelse($empresas as $e)
	<a href="{{ route('empresa', [$e->slug]) }}">
		<div class="resultado-i">
			<div class="div-img-r">
				<img src="{{ asset($e->url_foto)  }}" class="img-r">
			</div>
			<div class="info-r">
				<span class="nombre-r">{{$e->nombre}}</span>
				<span class="correo-r">{{$e->user->email}}</span>
			</div>
		</div>
	</a>
@empty
	<span class="sin-resultados">
		No se encontraron resultados.
	</span>
@endforelse