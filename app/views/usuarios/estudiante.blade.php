{{ $estudiante->nombre  }} {{ $estudiante->apellidos  }} <br/>

{{ $estudiante->user->email  }} <br/>

<a href="{{ route('area', [$estudiante->area->slug, $estudiante->area->id]) }}">{{ $estudiante->area->nombre  }}</a>