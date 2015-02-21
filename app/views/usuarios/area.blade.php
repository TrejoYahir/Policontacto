@extends('layout')

@section('content')

{{$area->nombre}}<br/>

@foreach ($area->estudiantes as $estudiante)
    <a href="{{ route('estudiante', [$estudiante->slug]) }}">{{ $estudiante->user->email }}</a><br/>
@endforeach

@foreach ($area->empresas as $empresa)
    <a href="{{ route('empresa', [$empresa->slug]) }}">{{ $empresa->user->email }}</a><br/>
@endforeach

@stop